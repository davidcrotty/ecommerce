<?php

include_once APPPATH."libraries/SqlOps.php";
include_once APPPATH."libraries/ValidationCheck/ValidationForm.php";

class Customer extends CI_Model implements SqlOps{

    /*
     * When called loads the bcrypt module for password hashing
     * */
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this->load->library('bcrypt');
		
	}

    /*
     * Loads all customers
     * */
	function getCustomers() {
		$query = $this -> db -> query('SELECT * FROM customer');

		$customerList = array();
				
		foreach ($query->result() as $row) {
			$temp = CustomerBO::fromHash($row);
			array_push($customerList, $temp);
		}

		print_r($customerList);

	}

    /*
     * Loads a specific customer
     * */
	function getCustomerById($id) {
		$query = $this -> db -> query('SELECT * FROM customer WHERE customerid=' . $id);
		
		foreach($query->result() as $row)
		{
			$cust = CustomerBO::fromHash($row);
			
		}
		
		return $cust;
	}

    /*
     * Return customer object and its associated addresses
     */
	public function getCustomerAddressList($id) {
	    
        $cust = $this->getCustomerById($id);
		$query = $this -> db -> query("SELECT T2.* FROM customer as T1, addresstable as T2, addressto as T3 WHERE T1.customerid = T3.custid AND T3.adressid = T2.addressid AND T1.customerid = " . $id);
        
		foreach ($query->result() as $row) {
			//make life easier, put into constructor
			$temp = AddressBO::fromHash($row);
            
			$cust->addAddress($temp);
		}

		return $cust;
	}
    
    /*
     * Insert a customer into the db, hash the password for security using bcrypt module
     */
	public function insert($object){
		
		$hash = $this->bcrypt->hash_password($object->getPassword());
		
		$result = false;
		if(-1 != $object->getCustomerId())
		{
			//should be an update instead
			$this->update($object);
		}else
		{
		$result = $this->db->query("INSERT INTO `ecommerce`.`customer` (`customerid`, `salutation`, `firstname`, `lastname`, `telephone`, `email`, `password`) VALUES (NULL, '".$object->getSalulation()
		."', '".$object->getFirstName()."', '".$object->getLastName()."', '".$object->getTelephone()."', '".$object->getEmail()."', '".$hash."')");
		}
	}
	
	//inserts addresses as well, could be condensed into a single insert, as we can test for its list being == null
	public function insertCustomerAddresses($customer)
	{
		//only customer gets inserted, its a has many addresses
		
		//customer is customer obj, ID gathered after inserted
		//addressArr is a potential array of addresses
		if(-1 == $customer->getCustomerId())
		{
			$this->insert($customer);
			
			$customer->setCustomerId($this->db->insert_id());
			//get last id of customer
			
			if(NULL == $customer->getAddressList())
			{
				//just insert customer
			}else
			{
				$this->load->model('Address');
				foreach($customer->getAddressList() as $value)
				{
					//add value
					$this->Address->insert($value);
					//get its ID 
					$value->setAddressid($this->db->insert_id());
					//add our many to many handler table link
					$this->db->query("INSERT INTO `ecommerce`.`addressto` (`id`, `custid`, `adressid`) VALUES (NULL, '".$customer->getCustomerId()."', '".$value->getAddressid()."');");
				}	
			}
			
			//return sql error  if possible
		}
		
		
	}
	
	public function update($object){
		
	}
	
	public function delete($id){
		
	}

    /*
     * Email validation
     */
    public static function validateEmail($email)
    {
        $instance = ValidationForm::getInstance();
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $instance->setUsernameValid(false);
            return array("result"=>0,"errorCode"=>"Invalid email");
            // invalid emailaddress
        }else
        {
           $instance->setUsernameValid(true);
           return array("result"=>1,"errorCode"=>"Valid email");
        }
    }
    
    /*
     * Password validation
     */
    public static function validatePassword($password)
    {
        $pattern = '/^.*(?=.{4,10})(?=.*\d)(?=.*[a-zA-Z]).*$/';
        $instance = ValidationForm::getInstance();
        
        if(preg_match($pattern,$password))
        {
            
            $instance->setPasswordValid(true);
            return array("result"=>1,"errorCode"=>"valid password");
        }else
        {
            $instance->setPasswordValid(false);
            return array("result"=>0,"errorCode"=>"Your password must contain at least one uppercase letter, a number and be between 4-8 characters");
        }
        
    }
    
     /*
     * Password match validation
     */
    public static function verifyPassword($password,$repassword)
    {
        $instance = ValidationForm::getInstance();
        if($password != $repassword)
        {
            
            $instance->setRepasswordValid(false);
            return array("result"=>0,"errorCode"=>"Passwords do not match");
        }else
        {
            $instance->setRepasswordValid(true);
            return array("result"=>1,"errorCode"=>"Passwords match");
        }
    }
    
     /*
     * standard field validation
     */
    public static function basicInput($input)
    {
        if($input == '')
        {
            return array("result"=>0,"errorCode"=>"Cannot be left blank");
        }else
        {
            return array("result"=>1,"errorCode"=>"Valid");
        }
    }
    
    //TODO, postcode validation
    public static function validatePostcode($postcode)
    {
        
    }
}
?>
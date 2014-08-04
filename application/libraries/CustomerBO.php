<?php
class CustomerBO {
	
	private $customerId;
	private $salulation;
	private $firstName;
	private $lastName;
	private $telephone;
	private $email;
	private $password;
	
	private $addressList;
	
	//from memory ONLY
	public function __construct($salulation,$firstName,$lastName,$telephone,$email,$password)
	{
		
		//used for representing memory objects
		$this->customerId = -1;
		$this->salulation = $salulation;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->telephone = $telephone;
		$this->email = $email;
		$this->password = $password;
		$this->addressList = array();
		
	}
	
	public static function fromHash($row)
	{
		
		$result = new self($row->salutation,$row->firstname,$row->lastname,$row->telephone,$row->email,$row->password);
		
		$result->setCustomerId($row->customerid);
		return $result;
	}
	
	public function toHash()
	{
		$result = array("customerId"=>$this->customerId,"salutation"=>$this->salulation,"firstName"=>$this->firstName,"lastName"=>$lastName,"telephone"=>$telephone,"email"=>$email,"password"=>$password);
		
		return $result;
	}
	
	public function addAddress($address)
	{
		array_push($this->addressList,$address);
	}
    
    public function getAddressList()
    {
        return $this->addressList;
    }
	
		public function getCustomerId(){
		return $this->customerId;
	}

	public function setCustomerId($customerId){
		$this->customerId = $customerId;
	}

	public function getSalulation(){
		return $this->salulation;
	}

	public function setSalulation($salulation){
		$this->salulation = $salulation;
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($lastName){
		$this->lastName = $lastName;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function setTelephone($telephone){
		$this->telephone = $telephone;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}


	
}

?>
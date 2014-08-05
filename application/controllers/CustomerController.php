<?php

require_once APPPATH.'/libraries/CustomerBO.php';
require_once APPPATH.'/libraries/AddressBO.php';
require_once APPPATH.'/libraries/ProductBO.php';
require_once APPPATH.'/libraries/SqlOps.php';


class CustomerController extends CI_Controller
{
    /*
     * Testing adding a new customer with an address then retreiving the customers address based on ID
     */
	public function customerView()
	{
		$this->load->model('Customer');
		$this->load->model('Address');
		
        
		$add = new addressBO("delivery","33","dfgdgf","york","ddd","45466");
		$cust = new CustomerBO("mr","Name","password","07","aa@","eee");
        $cust->addAddress($add);
        
        //$this->Customer->insertCustomerAddresses($cust);
		//$cust = $this->Customer->getCustomerById(1);
		//var_dump($cust);
		
		//$this->Customer->insert($cust);
		//$this->Address->insert($add);
		$result = $this->Customer->getCustomerAddressList(17);
		var_dump($result);
        
	}
    
}

?>
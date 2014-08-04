<?php

require_once APPPATH.'/libraries/CustomerBO.php';
require_once APPPATH.'/libraries/AddressBO.php';
require_once APPPATH.'/libraries/ProductBO.php';
require_once APPPATH.'/libraries/SqlOps.php';


class CustomerController extends CI_Controller
{
	public function customerView()
	{
		$this->load->model('Customer');
		$this->load->model('Address');
		
        
		$add = new addressBO("delivery","33","dfgdgf","york","ddd","45466");
		$cust = new CustomerBO("mr","secure","password","07","aa@","eee");
        $cust->addAddress($add);
        
        //$this->Customer->insertCustomerAddresses($cust);
		//$cust = $this->Customer->getCustomerById(1);
		//var_dump($cust);
		
		//$this->Customer->insert($cust);
		//$this->Address->insert($add);
		$result = $this->Customer->getCustomerAddressList(17);
		var_dump($result);
        
	}
    
    public function products()
    {
        $this->load->model('Product');
        //$this->Product->getProductList();
        $this->Product->buildFilter("a");
    }
	
    public function homePage()
    {
        //$this->load->view('home');
        //settings config
        $this->load->view('templates/config');
        $this->load->view('templates/footer');
        //nav

        //dynamic content
        
        //footer and closing
    }
    
}

?>
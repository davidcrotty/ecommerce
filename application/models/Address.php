<?php

class Address extends CI_Model implements SqlOps{
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}
	
	public function getAddressById($id)
	{
		
		
	}
	
	public function insert($object)
	{
		$result = false;
		if(-1 != $object->getAddressId())
		{
			$this->update($object);
		}else
		{
			$result = $this->db->query("INSERT INTO `ecommerce`.`addresstable` (`addressid`, `type`, `address1`, `address2`, `city`, `county`, `postcode`) VALUES (NULL, '".$object->getType()
			."', '".$object->getAddress1()."', '".$object->getAddress2()."', '".$object->getCity()."', '".$object->getCounty()."', '".$object->getPostcode()."');");
		}
		
		return $result;
	}
	public function update($object){
		
	}
	public function delete($id){}
	
	
	
}

?>
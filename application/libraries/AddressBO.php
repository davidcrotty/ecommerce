<?php

class AddressBO{
	
	private $addressid;
	private $type;
	private $address1;
	private $address2;
	private $city;
	private $county;
	private $postcode;
	
	//Memory only
	public function __construct($type,$address1,$address2,$city,$county,$postcode)
	{
		$this->addressid = -1;
		$this->type = $type;
		$this->address1 = $address1;
		$this->address2 = $address2;
		$this->city = $city;
		$this->county = $county;
		$this->postcode = $postcode;
	}
	
	//pull from DB ONLY
	public static function fromHash($row)
	{
		$instance = new self($row -> type, $row -> address1, $row -> address2, $row -> city, $row -> county, $row -> postcode);
        $instance->setAddressid($row->addressid);
        
		return $instance;
	}
	
	public function toHash()
	{
		$result = array("addressid"=>$this->addressid,"type"=>$this->type,"address1"=>$this->address1,"address2"=>$this->address2,"city"=>$this->city,"county"=>$this->county,"postcode"=>$this->postcode);
		return $result;
	}
	
		public function getAddressid(){
		return $this->addressid;
	}

	public function setAddressid($addressid){
		$this->addressid = $addressid;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getAddress1(){
		return $this->address1;
	}

	public function setAddress1($address1){
		$this->address1 = $address1;
	}

	public function getAddress2(){
		return $this->address2;
	}

	public function setAddress2($address2){
		$this->address2 = $address2;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCity($city){
		$this->city = $city;
	}

	public function getCounty(){
		return $this->county;
	}

	public function setCounty($county){
		$this->county = $county;
	}

	public function getPostcode(){
		return $this->postcode;
	}

	public function setPostcode($postcode){
		$this->postcode = $postcode;
	}
	
}

?>
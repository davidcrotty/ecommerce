<?php

class ProductBO {
    
    private $id;
    private $producttype;
    private $productname;
    private $productbrand;
    private $productprice;
    private $processor;
    private $RAM;
    private $graphics;
    private $onoffer;
    private $stock;
    private $productdescription;
    private $taxid;
    private $productimg;

    //from memory
    public function __construct($producttype,$productname,$productbrand,$productprice,$processor,$RAM,$graphics,$onoffer,$stock,$productdescription,$taxid,$productimg)
    {
        $this->id = -1;
        $this->producttype = $producttype;
        $this->productname = $productname;
        $this->productbrand = $productbrand;
        $this->productprice = $productprice;
        $this->processor = $processor;
        $this->RAM = $RAM;
        $this->graphics = $graphics;
        $this->onoffer = $onoffer;
        $this->stock = $stock;
        $this->productdescription = $productdescription;
        $this->taxid = $taxid;
        $this->productimg =$productimg;
       //set id to -1 
    }
    
    
    //from db
    public static function fromHash($row)
    {
        $object = new self($row->producttype,$row->productname,$row->productbrand,$row->productprice,$row->processor,$row->RAM,$row->graphics,$row->onoffer,$row->stock,$row->productdescription,$row->taxid,$row->imagepath);
        $object->setId($row->productid);
        return $object;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getProducttype(){
        return $this->producttype;
    }

    public function setProducttype($producttype){
        $this->producttype = $producttype;
    }

    public function getProductname(){
        return $this->productname;
    }

    public function setProductname($productname){
        $this->productname = $productname;
    }

    public function getProductbrand(){
        return $this->productbrand;
    }

    public function setProductbrand($productbrand){
        $this->productbrand = $productbrand;
    }

    public function getProductprice(){
        return $this->productprice;
    }

    public function setProductprice($productprice){
        $this->productprice = $productprice;
    }

    public function getProcessor(){
        return $this->processor;
    }

    public function setProcessor($processor){
        $this->processor = $processor;
    }

    public function getRAM(){
        return $this->RAM;
    }

    public function setRAM($RAM){
        $this->RAM = $RAM;
    }

    public function getGraphics(){
        return $this->graphics;
    }

    public function setGraphics($graphics){
        $this->graphics = $graphics;
    }

    public function getOnoffer(){
        return $this->onoffer;
    }

    public function setOnoffer($onoffer){
        $this->onoffer = $onoffer;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getProductdescription(){
        return $this->productdescription;
    }

    public function setProductdescription($productdescription){
        $this->productdescription = $productdescription;
    }

    public function getTaxid(){
        return $this->taxid;
    }

    public function setTaxid($taxid){
        $this->taxid = $taxid;
    }
    
    public function getProductimg(){
        return $this->productimg;
    }

    public function setProductimg($productimg){
        $this->productimg = $productimg;
    }
    
}

?>
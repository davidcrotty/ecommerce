<?php

require_once APPPATH."libraries/SqlOps.php";
require_once APPPATH."libraries/ProductBO.php";

class Product extends CI_Model implements SqlOps{
    
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    
    /**
     * return SQL view of brands
     */
    public function getCountOfProductsByBrand()
    {
        $query = $this->db->query("SELECT * FROM countofproductsbrandbybrand");
        
        $countOfproducts = array();
        foreach($query->result() as $row)
        {
            
            $temp = array("productbrand"=>$row->brand,"Count"=>$row->Count);
            array_push($countOfproducts,$temp);
        }
        
       return  $countOfproducts;
    }
    
    /**
     * return SQL view of processors
     */    
    public function getCountOfProductsByProcessor()
    {
            $query = $this->db->query("SELECT * FROM countofprocessorbytype");
            
            $countOfProcessors = array();
            foreach($query->result() as $row)
            {
                $temp = array("processor"=>$row->processor,"total"=>$row->total);
                array_push($countOfProcessors,$temp);
            }
        
        return $countOfProcessors;
        
    }
    
    /*
     * Uses built query to retreive productList data
     * */
    public function getProductFilteredList($statement)
    {
       $query = $this->db->query($statement);
       $productList = array();
       $index = 0; //needs to be associative for JSON 
        foreach ($query->result() as $row) {
            $temp = new ProductBO('',$row->productname,'',$row->productprice,'','','','','',$row->productdescription,'',$row->imagepath);
            array_push($productList, $temp);
            $productList[$index] = $temp;
            $index++;
        }

        return $productList; 
    }
    
    /*
     * Retreives all products of a particular type ie: Computers, monitors etc
     * */
    public function getProductList($type)
    {
        $query = $this -> db -> query('SELECT productname, productdescription, productprice, imagepath FROM product WHERE producttype="'.$type.'"');

        $productList = array();
                
        foreach ($query->result() as $row) {
            $temp = new ProductBO('',$row->productname,'',$row->productprice,'','','','','',$row->productdescription,'',$row->imagepath);
            array_push($productList, $temp);
        }

        return $productList;
    }
    
    /*
     * Get a specific product
     * */
    public function getProduct($id)
    {
        $query = $this -> db -> query('SELECT * FROM customer WHERE customerid=' . $id);
        
        foreach($query->result() as $row)
        {
            $prod = ProductBO::fromHash($row);
            
        }
        
        return $prod;
    }
    
    /*
     * SqlOps interface 
     */
    public function insert($object)
    {
        
    }
    
    public function update($object)
    {
        
    }
    
    public function delete($id)
    {
        
    }
}

?>
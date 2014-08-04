<?php

require_once APPPATH."libraries/SqlOps.php";
require_once APPPATH."libraries/ProductBO.php";

class Product extends CI_Model implements SqlOps{
    
    function __construct() {
        parent::__construct();
        $this -> load -> database();
    }
    
    /**
     * Load View
     */
    public function getCountOfProductsByBrand()
    {
        $query = $this->db->query("SELECT * FROM countofproductsbybrand");
        
        $countOfproducts = array();
        foreach($query->result() as $row)
        {
            $temp = array("productbrand"=>$row->productbrand,"Count"=>$row->Count);
            array_push($countOfproducts,$temp);
        }
        
       return  $countOfproducts;
    }
    
    /**
     * Load View
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
    
    public function getProductList($type)
    {
        $query = $this -> db -> query('SELECT productname, productdescription, productprice FROM product WHERE producttype="'.$type.'"');

        $productList = array();
                
        foreach ($query->result() as $row) {
            $temp = new ProductBO('',$row->productname,'',$row->productprice,'','','','','',$row->productdescription,'');
            array_push($productList, $temp);
        }

        return $productList;
    }
    
    public function getProduct($id)
    {
        $query = $this -> db -> query('SELECT * FROM customer WHERE customerid=' . $id);
        
        foreach($query->result() as $row)
        {
            $prod = ProductBO::fromHash($row);
            
        }
        
        return $prod;
    }
    
    public function buildFilter($keyword)
    {
        $keyword = "productbrand.asus";
        //pass in keypairs, ie brand = asus
        $query = 'SELECT productid, productname, productdescription, productprice FROM product WHERE ';
        //create filter list to prevent sql injection
        $filter = explode('.',$keyword);
         
        if($filter[0] != "productprice")
        {
           $appendSQL = $filter[0] . ' LIKE ' . "'".$filter[1]."'"; 
        }else if($filter[0] == "productprice")
        {
           //use between 
        }
        
        //if session contains non empty sql filter, prepend with AND
        //Add to Session
        echo $query.$appendSQL;
    die();
        //Session["sqlfilter"] + keyword

    }
    
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
<?php

include_once APPPATH."libraries/Templates.php";

class ProductsController extends CI_Controller{
    
    
    public function viewProducts()
    {
              $this->load->view('templates/config');
              $this->load->view('templates/inactiveNav');
              $this->load->view('templates/products.php');
              $this->load->view('templates/footer.php');
    }
    
    public function getSideBar()
    {
        $this->load->model('Product');
        //get brand html
        $productView = $this->Product->getCountOfProductsByBrand();
        $htmlArray = Templates::getProductBrand($productView); 
        
        //get processor html
        $processorArray = Templates::getProductProcessor($productView = $this->Product->getCountOfProductsByProcessor());
        
        $productsList = $this->buildQuery("normal"); //used to identify all products
        $productsHtml = Templates::getProductList($productsList);
        
        
        //make multi array for each subtype
        $data = array('products'=>$htmlArray,'processor'=>$processorArray,'productsList'=>$productsHtml);
        
        $this->load->view('templates/config');
        $this->load->view('templates/inactiveNav');
        $this->load->view('templates/products.php',$data);
        //call cost
        $this->load->view('templates/footer.php');        
    }
    
    public function refreshProducts()
    {
        //data comes in as JSON, post
        
        $result = $this->buildQuery(json_decode($this->input->post("value"),true));
        $html = Templates::getProductList($result);
        $ajaxResponse = json_encode($html);
        echo $ajaxResponse;
        
    }
    
    //move into products model
    private function buildQuery($json)
    {
        $this->load->model('Product');
        $result = "";
        
        if("normal" == $json)
        {
            $result = $this->Product->getProductList("computer");
        }
        else if(isset($json[0]["type"]))
        {
            $query = "SELECT productname, productdescription, productprice, imagepath FROM product WHERE ";
            //make an array, pass through as query
            for($i = 0; $i < sizeof($json); $i++)
            {
                $query .= $json[$i]["type"] . "='". $json[$i]["value"]."'";
                if($i != sizeof($json) -1)
                {
                    $query .= " AND ";
                } 
            }
            $result = $this->Product->getProductFilteredList($query);
        }
        else
        {
            $result = $this->Product->getProductList("computer");
        }
        
        
        return $result;
    }
    
}

?>
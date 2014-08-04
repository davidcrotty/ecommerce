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
        //$this->buildQuery(json_decode($this->input->post("value")));
        //reflection method if has type brand or price, push back 'brand+=+value AND', trim off AND at the end
        
        //SELECT * FROM products WHERE 
        $result = $this->buildQuery(json_decode($this->input->post("value"),true));

        var_dump($result);
    }
    
    //move into products model
    private function buildQuery($json)
    {
        $this->load->model('Product');
        $result = "";
        //if empty, get *, DONT remove AND at end
        //if contains brand, add brand and keypair with AND on the end
            //remove AND at end, pass in
        
        if("normal" == $json)
        {
            $result = $this->Product->getProductList("computer");
        }
        else if(isset($json[0]["type"]))
        {
            var_dump($json);
        }
        else
        {
            $result = $this->Product->getProductList("computer");
        }
        
        
        return $result;
    }
    
}

?>
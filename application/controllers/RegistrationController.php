<?php
//twig symphony - templating framework
include_once APPPATH . 'libraries/Templates.php';
include_once APPPATH . 'libraries/TemplateClasses/InputForm.php';
include_once APPPATH . 'libraries/ValidationCheck/ValidationForm.php';
include_once APPPATH . 'libraries/validation/FormValidator.php';
include_once APPPATH . 'libraries/CustomerBO.php';


class RegistrationController extends CI_Controller {

    //add hook here, if session is empty redirect to register

    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Singleton for accessing CI_Controller functionality outside the framework
     */
    public static function getInstance() {
        $instance = &get_instance();

        return $instance;
    }

    /*
     * Secure function, will check correct parameters are in place for deciding which view to show. Back override will send the use back and remove session
     * parts
     */
    public function register() {
        $outputHtml = array("form"=>"");
        $this -> load -> view('templates/config');
        $this -> load -> view('templates/inactiveNav');
        
        var_dump($this->session->userdata);

        if($this->input->post('submission') && $this->session->userdata('registerpage') !== TRUE) //&& session type is X
        {
            $formValidator = new FormValidator($this->input->post());
            $output = $formValidator->validate();
                if($output[3])
                {
                    array_pop($output);    
                    $this->session->set_userdata('registerpage',array("registerpage"=>"billing"));               
                    $this->session->set_userdata('customer',array('customer'=>new CustomerBO('','','','',$this->input->post('username'),$this->input->post('password'))));
                    //$this->session->set_userdata("anArray",array("anId"=>"test"));
                    $this->billingPage($outputHtml);
                }else
                {                
                    array_pop($output);
                    $outputHtml["form"] = $output;
                    $this -> load -> view('templates/register',$outputHtml);
                }
        }
        else if($this->session->userdata('registerpage') !== FALSE)
        {
           //array needs to be made passing in form objects, result HAS to be html
           $this->billingPage($outputHtml);
        }
        else
        {
            $outputHtml["form"] = array(Templates::getUsernameInput(false),Templates::getPasswordInput(false),Templates::getRePasswordInput(false));
            //call a class to load the appropriate
            $this -> load -> view('templates/register',$outputHtml);
            //add flash into array too
                        
        }

        $this -> load -> view('templates/footer');
    }

    private function billingPage($outpuHtml)
    {
           $outputHtml["form"] = array(InputForm::getValid("firstNameInput", "text", "firstName"));
           $this->load->view('templates/billing',$outputHtml);
    }

    public function validateForm($hashMap)
    {
        var_dump($hashMap);
    }
    
    /*
     * TODO
     * Second page, INCOMPLETE function will filter out the second page for server side validation while using the same url client side
     */
    public function registerBilling() {
        //if register complete, from singleton, carry on
        //singleton WONT work, as when a process dies, so does the singleton, resulting in everything below being false
        $this->load->model('Customer');
        //do a check function, just looks at Customer validation, if any are false prior can deal with it
        $username = Customer::validateEmail($this->input->post('username'));
        $password = Customer::validatePassword($this->input->post('password'));
        $repassword = Customer::verifyPassword($this->input->post('password'),$this->input->post('passwordvalid'));
        
        //TODO fix entering this from browser
        
        if($username["result"] != 1 || $password["result"] != 1 || $repassword["result"] != 1)
        {
             $this -> session -> set_userdata('redirect', true);
             $this -> register();           
        }else{

            if(null != $this->input->post('username') && null != $this->input->post('password'))
            {
                $this->session->set_userdata('Customer',new CustomerBO('','','','',$username,$password));
            }
            
            $this -> load -> view('templates/config');
            $this -> load -> view('templates/inactiveNav');
            $this -> load -> view('templates/billing');
            $this -> load -> view('templates/footer');
            //set session complete

        }
        
    }

    public function registerSummary() {
        //if register billing and register complete in session
        //if checkbox ticked
            //just check billing
        //else
            //check everything
         
    }
    
    public function registerFinalise()
    {
        //if all other stages complete (session)
            //Submit to db
    }
    
    /*
     * Performs model validation
     */
    public function validate() {
        $this -> load -> model('Customer');

        if ($this -> input -> post("type") == "email") {
            $data = Customer::validateEmail($this -> input -> post("value"));
            $this -> encodeWrite($data);
        } else if ($this -> input -> post("type") == "password") {
            $data = Customer::validatePassword($this -> input -> post("value"));
            $this -> encodeWrite($data);
        } else if ($this -> input -> post("type") == "repassword") {
            $data = Customer::verifyPassword($this -> input -> post("value"), $this -> input -> post("match"));
            $this -> encodeWrite($data);
        }else if($this->input->post("type")== "firstName")
        {
            $data = Customer::basicInput($this -> input -> post("value"));
            $this -> encodeWrite($data);
        }
        

    }

    //Encodes to JSON and echos response
    private function encodeWrite($data) {
        $result = array("response" => $data["result"], "errorCode" => $data["errorCode"]);
        //include resulting text also
        $response = json_encode($result);
        //write back tick or cross html to insert
        echo $response;
    }

}
?>
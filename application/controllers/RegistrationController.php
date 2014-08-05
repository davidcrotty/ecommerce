<?php
//twig symphony - templating framework
include_once APPPATH . 'libraries/Templates.php';
include_once APPPATH . 'libraries/ValidationCheck/ValidationForm.php';
include_once APPPATH . 'libraries/CustomerBO.php';


class RegistrationController extends CI_Controller {

    //add hook here, if session is empty redirect to register

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

        
        $instance = ValidationForm::getInstance();
        //if redirect true, grab from Session a valid field object and plug into array for passing here
        if ($this -> session -> userData('redirect')) {
            $username = $instance -> getUsernameInput($this -> input -> post('username'));
            $password = $instance -> getPasswordInput($this -> input -> post('password'));
            $repassword = $instance -> getRePasswordInput($this -> input -> post('password'), $this -> input -> post('passwordvalid'));

            $warning = true; //to show the use the error message
            $this -> session -> set_userdata('redirect', false);
        } else {
            $username = Templates::getUsernameInput(false);
            //instance get username input
            $password = Templates::getPasswordInput(false);
            $repassword = Templates::getRepasswordInput(false);
            $warning =false;
        }
        $data = array('username' => $username, 'password' => $password, 'repassword' => $repassword,'flashWarning'=>Templates::getWarningHeader($warning));

        $this -> load -> view('templates/config');
        $this -> load -> view('templates/inactiveNav');
        //call a class to load the appropriate
        $this -> load -> view('templates/register', $data);
        //add flash into array too
        $this -> load -> view('templates/footer');
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
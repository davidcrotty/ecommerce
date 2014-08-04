<?php

include_once APPPATH.'libraries/Templates.php';

class ValidationForm {

    private static $instance;
    private $passwordValid;
    private $repasswordValid;
    private $usernameValid;
    private $CI;

    public function __construct() {
        //get CI instance
        $this->CI =& get_instance();
        $this->CI->load->model('Customer');
    }

    public static function getInstance() {

        if (null == ValidationForm::$instance ) {
            ValidationForm::$instance = new self();
        }

        return ValidationForm::$instance; 
    }
    
    
    
    //gets appropriate password html
    public function getPasswordInput($post)
    {    
        if(Customer::validateEmail($post)["result"]==0)
        {
            return Templates::getPasswordInput(true);          
        }else
        {
            return Templates::getPasswordInput(false); 
        }
        
    }
    
    //gets appropriate repassword field html
    public function getRePasswordInput($post,$repost)
    {   
        if(Customer::verifyPassword($post, $repost)["result"]==0)
        {

            return Templates::getRePasswordInput(true);          
        }else
        {

            return Templates::getRePasswordInput(false);
        }
    }
    
    //gets appropriate email field input
    public function getUsernameInput($post)
    {
        if((Customer::validateEmail($post)["result"])==0)
        {
             
            return Templates::getUsernameInput(true);          
        }else
        {
             
            return Templates::getUsernameInput(false); 
        }
    }
    //getPasswordInput //returns HTML, and sets variable to true
    //getRePasswordInput
    //getUsernameInput
    //is all valid function
    
    public function getRegisterHomeValid()
    {
        $return = false;
        
        if($this->getPasswordValid() && $this->getPasswordValid() && $this->getUsernameValid())
        {
            $return = true;
        }
        
        return $return;
    }
    
    public function getPasswordValid(){
        return $this->passwordValid;
    }

    public function setPasswordValid($passwordValid){
        $this->passwordValid = $passwordValid;
    }

    public function getRepasswordValid(){
        return $this->repasswordValid;
    }

    public function setRepasswordValid($repasswordValid){
        $this->repasswordValid = $repasswordValid;
    }

    public function getUsernameValid(){
        return $this->usernameValid;
    }

    public function setUsernameValid($usernameValid){
        $this->usernameValid = $usernameValid;
    }
}
?>
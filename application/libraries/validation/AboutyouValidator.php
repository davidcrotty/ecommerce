<?php

require_once "Ivalidatable.php";

class AboutyouValidator implements Ivalidatable{
    
    private $username;
    private $password;
    private $repassword;
    
    private $passwordValid, $usernameValid, $repasswordValid;
    
    public function __construct($array)
    {
        $this->username = $array["username"];
        $this->password = $array["password"];
        $this->repassword = $array["passwordvalid"];
        
        $this->passwordValid = false;
        $this->usernameValid = false; 
        $this->repasswordValid = false;
    }
    
    public function validate()
    {
        //TODO
        $returnData = array();
        
        array_push($returnData,$this->validateUsername());
        array_push($returnData,$this->validatePassword());
        array_push($returnData,$this->validateRePassword());
        
        if($this->usernameValid && $this->passwordValid && $this->repasswordValid)
        {
            array_push($returnData,true);
        }else
        {
            array_push($returnData,false);
        }
        
        //return warning div, username html, password html, repassword html
        return $returnData;
    }
    
    private function validatePassword()
    {
        if(preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{4,8}$/',$this->password))
        {
            $html = Templates::getPasswordInput(false);
            $this->passwordValid = true;
        }else
        {
            $html = Templates::getPasswordInput(true);
            $this->passwordValid = false;
        }
        
        return $html;
    }

    private function validateRePassword()
    {
        if($this->password == $this->repassword)
        {
            $html = Templates::getRePasswordInput(false);
            $this->repasswordValid = true;
        }else
        {
            $html = Templates::getRePasswordInput(true);
            $this->repasswordValid = false;
        }
        
        return $html;
    }
    
    private function validateUsername()
    {
        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $this->username))
        {
            $html = Templates::getUsernameInput(false);
            $this->usernameValid = true; 
        }else
        {
            $html = Templates::getUsernameInput(true);
            $this->usernameValid = false; 
        }
        
        return $html;
    }
}

?>
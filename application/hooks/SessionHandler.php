<?php

include_once APPPATH."controllers/RegistrationController.php";

class SessionHandlerHook{
    
    public function __construct()
    {

    }
    
     public function checkAccountCompletion()
    {
        //check session completion versus page link
        //ie if on billingInfo page and prior isnt in session
        //redirect with flash error (do that bit in controller
        //session_start();
        
        //Word of caution, will fall over if the current page you are trying to access IS NOT an instance of the right class
        $instance = RegistrationController::getInstance();
        if($instance instanceof RegistrationController)
        {
            //check if user has finished page one
        }else
        {
            
        }
        
        
        
    }

}

?>
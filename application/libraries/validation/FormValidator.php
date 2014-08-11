<?php

require_once "Ivalidatable.php";
require_once "AboutyouValidator.php";

class FormValidator implements Ivalidatable {

    private $ivalidatable;

    public function __construct($array) {
        $acceptableNames = array("submission"=>"aboutyou");
        //idea is to get the posts button press, and then associate it with an iValidate behaviour
        
        if(array_key_exists("submission", $array))
        {
            switch($array["submission"])
            {
                case "aboutyou":
                        $this->ivalidatable = new AboutyouValidator($array);
                    break;
                case "billinginfo":
                        echo "billingInfo"; //TODO
                    break;
                default:
                    echo "error";
            }
            
            
        }else
        {
            echo "error";
            die();
        }

        


    }

    /*
     * Return the validation result by calling the interface behaviour implementation
     */
    public function validate() {
        return $this -> ivalidatable -> validate();
    }

}
?>
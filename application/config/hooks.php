<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
    //handle whats in the session
    //use observer pattern

//Warning to hook behaviour! Class name CANNOT be the same as file name, the constructor is automatically invoked before function call
$hook['post_controller_constructor']= array(
    'class'=>'SessionHandlerHook',
    'function'=>'checkAccountCompletion',
    'filename'=>'SessionHandler.php',
    'filepath'=>'hooks',
    'params'=>''
);
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
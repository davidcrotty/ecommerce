<?php

class NavigationController extends CI_Controller{
    
    private $activeArray; //used to determine which link is highlighted as active
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function home()
    {
        $data = array("about"=>'<li><a class="customhover" href="about">About</a></li>',
        "FAQ"=>'<li><a class="customhover" href="faq">FAQ</a></li>',
        "contact"=>'<li><a class="customhover" href="contact">Contact</a></li>',
        "login"=>'<li><a class="customhover" href="login">Login</a></li>');
        
        $this->load->view('templates/config');
        $this->load->view('templates/navigation',$data);
        $this->load->view('templates/footer');
    }
    
    public function about()
    {
        //Keys are converted into variables
        $data = array("about"=>'<li class="active"><a class="customhover" href="about">About</a></li>',
        "FAQ"=>'<li><a class="customhover" href="faq">FAQ</a></li>',
        "contact"=>'<li><a class="customhover" href="contact">Contact</a></li>',
        "login"=>'<li><a class="customhover" href="login">Login</a></li>');
        
        $this->load->view('templates/config');
        $this->load->view('templates/navigation',$data);
        $this->load->view('templates/home');
        $this->load->view('templates/footer'); 
    }
    
    public function FAQ()
    {
        $data = array("about"=>'<li><a class="customhover" href="about">About</a></li>',
        "FAQ"=>'<li class="active"><a class="customhover" href="faq">FAQ</a></li>',
        "contact"=>'<li><a class="customhover" href="contact">Contact</a></li>',
        "login"=>'<li><a class="customhover" href="login">Login</a></li>');
        
        $this->load->view('templates/config');
        $this->load->view('templates/navigation',$data);
        $this->load->view('templates/faq');
        $this->load->view('templates/footer'); 
    }
    
    public function contact()
    {
        $data = array("about"=>'<li><a class="customhover" href="about">About</a></li>',
        "FAQ"=>'<li><a class="customhover" href="faq">FAQ</a></li>',
        "contact"=>'<li class="active"><a class="customhover" href="contact">Contact</a></li>',
        "login"=>'<li><a class="customhover" href="login">Login</a></li>');  
        
        $this->load->view('templates/config');
        $this->load->view('templates/navigation',$data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');       
    }
    
    public function login()
    {
         $data = array("about"=>'<li><a class="customhover" href="about">About</a></li>',
        "FAQ"=>'<li><a class="customhover" href="faq">FAQ</a></li>',
        "contact"=>'<li><a class="customhover" href="contact">Contact</a></li>',
        "login"=>'<li class="active"><a class="customhover" href="login">Login</a></li>');         
        
        $this->load->view('templates/config');
        $this->load->view('templates/navigation',$data);
        $this->load->view('templates/login');
        $this->load->view('templates/footer');            
    }
    
}


?>
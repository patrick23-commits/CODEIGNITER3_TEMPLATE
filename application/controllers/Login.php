<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
    }
    public function index(){
        
        
        $main['accounts'] = $this->Login_Model->getAllAccounts();

        $this->load->view("templates/header_", isset($header) ? $header : []);
        $this->load->view("pages/login", isset($main) ? $main : []);
        $this->load->view("templates/footer", isset($footer) ? $footer : []);
    }

    public function register(){
        if(empty($_POST)){ $_POST = json_decode(file_get_contents('php://input'), true); }

        extract($this->input->post());

        echo $this->Login_Model->registerAccount($username, $password, $firstname, $middlename, $lastname) ? "SUCCESS" : "FAILED";
    }

    public function validate(){
        if(empty($_POST)){ $_POST = json_decode(file_get_contents('php://input'), true); }

        $username = $this->input->post('username');
        $password = $this->input->post('password'); 

        print_r($this->Login_Model->validateAccount($username, $password));

        //echo count($this->Login_Model->validateAccount($username, $password)) > 0 ? "SUCCESS" : "FAILED";
    }

    public function  getStudentAccounts(){
        
    }

}

?>
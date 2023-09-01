<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Login extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
    }

    public function getallaccounts() {
        
        echo $this->Login_Model->getAllAccounts(); 
    }

    public function index(){
        
        $header['js'] = ['main'];
        $header['css'] = ['login'];

        $footer['js'] = ['footer', 'login'];

        $this->load->view("templates/header", isset($header) ? $header : []);
        $this->load->view("pages/login", isset($main) ? $main : []);
        $this->load->view("templates/footer", isset($footer) ?   $footer : []);
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
        
        echo json_encode($this->Login_Model->validateAccount($username, $password));
    }
    public function edit() {
        extract($this->input->post());
        
        $query = "update login set firstname = '$firstname', middlename = '$middlename', lastname = '$lastname' where id = '$id'";
        $this->db->query($query);
        // print_r($this->input->post());
    }
    public function delete(){
        extract($this->input->post());
        $query = "update login set active = '0' where id='$id'";
        $this->db->query($query);
    }
    
    public function  getStudentAccounts(){
        
    }

    public function save_user(){
        extract($this->input->post());
        $this->Login_Model->saveUser($id, $fname, $mname, $lname, $nn, $age, $g, $addr, $num, $bday);

    }

}

?>
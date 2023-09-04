<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class AlliahController extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
        $this->load->model('AlliahUserModel', 'Alliah_m');
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('AlliahView');
        $this->load->view('templates/footer');
    }
    public function login(){
       
            $username = $_POST['username'];
            $password = $_POST['password'];


            
           $result = $this->Alliah_m->validate_user($username, $password);
           if($result->validate == 1){
            $data['result'] = 1;
            
           }else{
            $data['result'] = 'account not found';
           
           }

           echo json_encode($data);

    }
    public function main(){

        $data['allusers'] = $this->Alliah_m->getAllRecords();
        $this->load->view('templates/header');
        $this->load->view('AlliahMainView',$data);
        $this->load->view('templates/footer');
    }
        

}

?>
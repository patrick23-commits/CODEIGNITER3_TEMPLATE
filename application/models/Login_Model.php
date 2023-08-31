<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function validateAccount($uname, $pword) : array{
        return $this->db->query(
            "SELECT firstname, middlename, lastname, COUNT(id) `count` FROM login WHERE `username` = '$uname' and `password` = PASSWORD('$pword') GROUP BY `id`"
        )->result_array();
    }

    public function registerAccount($username,  $password, $firstname, $middlename, $lastname) : bool{
        return $this->db->query(
            "INSERT INTO login(`username`,`password`,`firstname`,`middlename`,`lastname`)
            VALUES('$username',PASSWORD('$password'),'$firstname','$middlename','$lastname')"
        );
    }

    public function getAllAccounts(){
        return json_encode($this->db->query("SELECT firstname `First Name`, middlename `Middle Name`, lastname `Last Name` FROM login")->result_array());
    }

}
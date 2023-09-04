<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlliahUserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function validate_user($username, $password){
        
        $sql = "select count(*) as validate from ojt_test_db.Alliah_users where username = '{$username}' and password = '{$password}'" ;
        return $this->db->query($sql)->row();
    }

    public function getAllRecords(){

        $sql= "SELECT 
                    *
                FROM
                    ojt_test_db.students a
                LEFT JOIN
                    ojt_test_db.sections b on a.section_id = b.section_id";
        $result = $this->db->query($sql)->result_array();

        return $result;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function validateAccount($uname, $pword) : array{
      
        return $this->db->query(
        "SELECT 
            login.id `id`,
            login.firstname `firstname`, 
            login.middlename `middlename`, 
            login.lastname `lastname`,
            info.nickname `nickname`,
            info.age `age`,
            info.gender `gender`,
            info.address `address`,
            lpad(contact_num, 11, '0') `num`,
            info.bday `bday`
        FROM ojt_test_db.login as login
        INNER JOIN ojt_test_db.info_id as info
        ON info.user_id = login.id
        WHERE login.`username` = '$uname' and login.`password` = PASSWORD('$pword') and active = '1'
        "            
        )->result_array();
    }

    public function saveUser($id, $fname, $mname, $lname, $nn, $age, $g, $addr, $num, $bday){
        $query = 
        "UPDATE login set firstname = '$fname', middlename = '$mname', lastname = '$lname'
        WHERE id = '$id';
        ";
        $this->db->query($query);

        $query = 
        "UPDATE info_id set nickname = '$nn', age = '$age', gender = '$g', address = '$addr', contact_num = '$num', bday = '$bday'
        WHERE user_id = '$id';
        ";
        $this->db->query($query);
    }

    public function registerAccount($username,  $password, $firstname, $middlename, $lastname) : bool{
        $query = 
        "INSERT INTO login(`username`,`password`,`firstname`,`middlename`,`lastname`)
        VALUES('$username',PASSWORD('$password'),'$firstname','$middlename','$lastname')
        ";

        $this->db->query($query);

        $id = $this->db->insert_id();

        $query = 
        "INSERT INTO info_id
        VALUES('','','','','','','$id')
        ";

        return $this->db->query($query);
        
    }

    public function getAllAccounts(){
        
        $accounts = $this->db->query("SELECT id, firstname `First Name`, middlename `Middle Name`, lastname `Last Name` FROM login WHERE active = 1")->result_array();
        foreach($accounts as &$account) {
            $account['First Name'] = "<input class='acc-text form-control' id='fname_".$account['id']."' type='text' value='".$account['First Name']."' placeholder='First Name' disabled>";
            $account['Last Name'] = "<input class='acc-text form-control' id='lname_".$account['id']."' type='text' value='".$account['Last Name']."' placeholder='Last Name' disabled>";
            $account['Middle Name'] = "<input class='acc-text form-control' id='mname_".$account['id']."' type='text' value='".$account['Middle Name']."' placeholder='Middle Name' disabled>";

            array_push($account, '
            <button id="id-btn-save_'.$account['id'].'" class="btn btn-success hide" onclick="save('.$account["id"].')"><i class="fa-regular fa-floppy-disk"></i> SAVE</button> 
            <button id="id-btn-edit_'.$account['id'].'" class="btn btn-primary" onclick="edit('.$account["id"].')"><i class="fa-regular fa-pen-to-square"></i> EDIT</button> 
            <button id="id-btn-del_'.$account['id'].'" class="btn btn-danger" onclick="del('.$account["id"].')"><i class="fa-regular fa-trash-can"></i> DELETE</button>
            ');
        }

        return json_encode($accounts);
    
    } 
}
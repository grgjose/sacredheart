<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
        public function users_insert($username, $password, $usertype, $fname, $mname, $lname, $email, $address, $contact, $userfile){
			$data = array(
				'username' => $username,
				'password' => $password,
				'usertype' => $usertype,
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'email' => $email,
				'address' => $address,
				'contact' => $contact,
				'userfile' => $userfile
			);

			$this->db->insert('tbl_users', $data);
			$this->db->close();
            return true;
        }
        
        public function users_retrieve(){
            $query = $this->db->get('tbl_users');
            $this->db->close();
            return $query->result();
        }
        
        public function users_update($id, $username, $password, $firstname, $lastname, $email, $number, $userlevel){
            
            $this->db->query('UPDATE `tbl_users` SET `user_id`="'.$id.'",`username`="'.$username.'",`password`="'.$password.'",`firstname`="'.$firstname.'",`lastname`="'.$lastname.'",`email`="'.$email.'",`number`="'.$number.'",`userlevel`="'.$userlevel.'" WHERE user_id ='.$id);
            $this->db->close();
        }
        
        public function users_delete($id){
            $this->db->delete('tbl_users',"user_id = ".$id);
            return true;
        }

    }

?>
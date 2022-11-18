<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
			$this->load->dbutil();
        }    
    
        public function users_insert($password, $usertype, $email, $fname, $mname, $lname, $address, $contact, $userfile, $approved, $reg_userfile){
			
			$dbs = $this->dbutil->list_databases();
			foreach ($dbs as $db) { $mydb = $db; break; }

			$sql = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '". $mydb ."' AND TABLE_NAME = 'tbl_users';";

			$query = $this->db->query($sql);
			$val = $query->result();

			foreach ($val as $x){ $ai = $x->AUTO_INCREMENT; }

			$data = array(
				'username' => 'user_'.$ai,
				'password' => $password,
				'usertype' => $usertype,
				'email' => $email,
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'address' => $address,
				'contact' => $contact,
				'userfile' => $userfile,
				'approved' => $approved,
				'verification_code' => '',
				'reg_userfile' => $reg_userfile,
				'dp_userfile' => ''
			);

			$this->db->insert('tbl_users', $data);
			$this->db->close();
            return true;
	
        }
        
        public function users_retrieve($id = null){
			if($id !== null) { $this->db->where('user_id', $id); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_users');
            $this->db->close();
            return $query->result();
        }
        
		public function users_update_verification_code($code, $email){
            $this->db->set('verification_code', $code);
			$this->db->where('email', $email);
			$this->db->update('tbl_users'); 
            $this->db->close();
        }

		public function users_update_validation_code($code, $email){
            $this->db->set('validation_code', $code);
			$this->db->where('email', $email);
			$this->db->update('tbl_users'); 
            $this->db->close();
        }

		public function users_update_approve($approved, $email){
            $this->db->set('approved', $approved);
			$this->db->where('email', $email);
			$this->db->update('tbl_users'); 
            $this->db->close();
        }

		public function users_update_approve_by_id($id, $approved){
            $this->db->set('approved', $approved);
			$this->db->where('user_id', $id);
			$this->db->update('tbl_users'); 
            $this->db->close();
        }

		public function users_update_password($password, $code, $email){
            $this->db->set('password', $password);
			$this->db->set('verification_code', $code);
			$this->db->where('email', $email);
			$this->db->update('tbl_users'); 
            $this->db->close();
        }

        public function users_update($id, $password, $usertype, $email, $fname, $mname, $lname, $address, $contact, $userfile, $approved, $reg_userfile){

			$data = array(
				'password' => strval($password),
				'usertype' => intval($usertype),
				'email' => strval($email),
				'fname' => strval($fname),
				'mname' => strval($mname),
				'lname' => strval($lname),
				'address' => strval($address),
				'contact' => strval($contact),
				'userfile' => strval($userfile),
				'approved' => intval($approved),
				'verification_code' =>  '',
				'reg_userfile' => strval($reg_userfile),
				'dp_userfile' =>  ''
			);
			
			

			$this->db->where('user_id', $id);
			$this->db->update('tbl_users', $data);
			$this->db->close();
		
			//echo $this->db->last_query();
            
			//return stlval(1);
			return true;
        }

		public function users_update_userfile($id, $userfile){
			$data = array(
				'userfile' => strval($userfile)
			);

			$this->db->where('user_id', $id);
			$this->db->update('tbl_users', $data);
			$this->db->close();
			return true;
		}

		public function users_official_update($id, $position, $dp_userfile){

			$data = array(
				'position' => $position,
				'dp_userfile' => $dp_userfile
			);

			$this->db->where('user_id', $id);
			$this->db->update('tbl_users', $data);
			$this->db->close();
            return true;
        }
        
        public function users_delete($id){
			$this->db->where('user_id', $id);
            $this->db->delete('tbl_users');
			$this->db->close();
            return true;
        }

    }

?>

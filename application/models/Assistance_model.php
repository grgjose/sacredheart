<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistance_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
        public function assistance_insert($user_id, $assistance_type, $assistance_purpose, $date_needed){
			$data = array(
				'user_id' => $user_id,
				'assistance_type' => $assistance_type,
				'assistance_purpose' => $assistance_purpose,
				'date_needed' => $date_needed
			);

			$this->db->insert('tbl_assistance', $data);
			$this->db->close();
            return true;
        }

  }

?>

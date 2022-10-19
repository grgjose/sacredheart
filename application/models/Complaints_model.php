<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaints_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
        public function complaint_insert($user_id, $complaint_description, $complaint_letter){
			$data = array(
				'user_id' => $user_id,
				'complaint_description' => $complaint_description,
				'complaint_letter' => $complaint_letter
			);

			$this->db->insert('tbl_complaints', $data);
			$this->db->close();
            return true;
        }

    }

?>

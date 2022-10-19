<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
        public function request_insert($user_id, $document_type, $document_purpose, $date_needed){
			$data = array(
				'user_id' => $user_id,
				'document_type' => $document_type,
				'document_purpose' => $document_purpose,
				'date_needed' => $date_needed
			);

			$this->db->insert('tbl_requests', $data);
			$this->db->close();
            return true;
        }

    }

?>

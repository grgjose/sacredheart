<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receivers_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function receiver_retrieve($receiver_id = null){
			if($receiver_id !== null) { $this->db->where('receiver_id', $receiver_id); }
            $query = $this->db->get('tbl_receivers');
            $this->db->close();
            return $query->result();
        }

        public function receiver_insert($user_id, $assistance_type, $assistance_purpose, $date_needed){
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

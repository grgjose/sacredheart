<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
        public function request_insert($user_id, $document_type, $document_purpose, $userfile, $date_needed){
			$data = array(
				'user_id' => $user_id,
				'document_type' => $document_type,
				'document_purpose' => $document_purpose,
				'document_userfile' => $userfile,
				'date_needed' => $date_needed
			);

			$this->db->insert('tbl_requests', $data);
			$this->db->close();
            return true;
        }

		public function request_retrieve($id = null){
			if($id !== null) { $this->db->where('user_id', intval($id)); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_requests');
            $this->db->close();
            return $query->result();
		}

		public function request_update($id, $status, $remarks)
		{
			$this->db->set('remarks', $remarks);
			$this->db->set('status', $status);
			$this->db->set('seen', $status);
			$this->db->where('request_id', $id);
			$this->db->update('tbl_requests'); 
            $this->db->close();
		}

		public function request_seen($id)
		{
			$this->db->set('seen', 0);
			$this->db->where('user_id', $id);
			$this->db->update('tbl_requests'); 
            $this->db->close();
		}

		public function request_types_retrieve($id = null){
			if($id !== null) { $this->db->where('request_type_id', intval($id)); }
            $query = $this->db->get('tbl_request_types');
            $this->db->close();
            return $query->result();
		}

		public function request_types_insert($type){
			$data = array(
				'request_type' => $type
			);

			$this->db->insert('tbl_request_types', $data);
			$this->db->close();
            return true;
		}

		public function request_types_delete($id)
		{
			$this->db->where('request_type_id', $id);
			$this->db->delete('tbl_request_types');
			return true;
		}


    }

?>

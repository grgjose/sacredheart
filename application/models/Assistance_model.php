<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistance_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
		//tbl_assistance
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

		public function assistance_retrieve($id = null){
			if($id !== null) { $this->db->where('user_id', intval($id)); }
            $this->db->order_by('date_created', 'DESC');
			$query = $this->db->get('tbl_assistance');
            $this->db->close();
            return $query->result();
		}

		public function assistance_update($id, $status, $remarks)
		{
			$this->db->set('remarks', $remarks);
			$this->db->set('status', $status);
			$this->db->set('seen', $status);
			$this->db->where('assistance_id', $id);
			$this->db->update('tbl_assistance'); 
            $this->db->close();
		}

		public function assistance_seen($id)
		{
			$this->db->set('seen', 0);
			$this->db->where('user_id', $id);
			$this->db->update('tbl_assistance'); 
            $this->db->close();
		}

		public function assistance_delete($id)
		{
			$this->db->where('assistance_id', $id);
			$this->db->delete('tbl_assistance');
			$this->db->where('assistance_id', $id);
			$this->db->delete('tbl_assistance_remarks');
			$this->db->close();
		}

		//tbl_assistance_types
		public function assistance_types_retrieve($id = null){
			if($id !== null) { $this->db->where('assistance_type_id', intval($id)); }
			$query = $this->db->get('tbl_assistance_types');
            $this->db->close();
            return $query->result();
		}

		public function assistance_types_insert($type){
			$data = array(
				'assistance_type' => $type
			);

			$this->db->insert('tbl_assistance_types', $data);
			$this->db->close();
            return true;
		}

		public function assistance_types_update($id, $type){
			$data = array(
				'assistance_type' => $type
			);

			$this->db->where('assistance_type_id', $id);
			$this->db->update('tbl_assistance_types', $data);
			$this->db->close();
            return true;
		}

		public function assistance_types_delete($id)
		{
			$this->db->where('assistance_type_id', $id);
			$this->db->delete('tbl_assistance_types');
			return true;
		}

		//tbl_assistance_remarks
		public function assistance_remarks_retrieve($id = null){
			if($id !== null) { $this->db->where('assistance_id', intval($id)); }
			$query = $this->db->get('tbl_assistance_remarks');
            $this->db->close();
            return $query->result();
		}

		public function assistance_remarks_insert($id, $user_id, $remark, $status){
			$data = array(
				'assistance_id' => $id,
				'user_id' => $user_id,
				'remark' => $remark,
				'status' => $status
			);

			$this->db->insert('tbl_assistance_remarks', $data);
			$this->db->close();
            return true;
		}

		public function assistance_remarks_update($id, $user_id, $remark, $status){
			$data = array(
				'assistance_id' => $id,
				'user_id' => $user_id,
				'remark' => $remark,
				'status' => $status
			);

			$this->db->where('assistance_remark_id', $id);
			$this->db->update('tbl_assistance_remarks', $data);
			$this->db->close();
            return true;
		}

		public function assistance_remarks_delete($id)
		{
			$this->db->where('assistance_remark_id', $id);
			$this->db->delete('tbl_assistance_remarks');
			return true;
		}


  }

?>

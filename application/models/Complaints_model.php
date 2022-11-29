<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaints_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    
    
		//tbl_complaints
		//
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

		public function complaint_retrieve($id = null){
			if($id != null) { 
				$this->db->where('user_id', intval($id)); 
			}
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_complaints');
            $this->db->close();
            return $query->result();
		}

		public function complaint_update($id, $status, $remarks)
		{
			$this->db->set('remarks', $remarks);
			$this->db->set('status', $status);
			$this->db->set('seen', $status);
			$this->db->where('complaint_id', $id);
			$this->db->update('tbl_complaints'); 
            $this->db->close();
		}


		public function complaint_seen($id)
		{
			$this->db->set('seen', 0);
			$this->db->where('user_id', $id);
			$this->db->update('tbl_complaints'); 
            $this->db->close();
		}

		public function complaint_delete($id)
		{
			$this->db->where('complaint_id', $id);
			$this->db->delete('tbl_complaints');
			$this->db->where('complaint_id', $id);
			$this->db->delete('tbl_complaint_remarks');
			$this->db->close();
		}

		//tbl_complaint_remarks
		public function complaint_remarks_retrieve($id = null){
			if($id !== null) { $this->db->where('complaint_id', intval($id)); }
			$query = $this->db->get('tbl_complaint_remarks');
            $this->db->close();
            return $query->result();
		}

		public function complaint_remarks_insert($id, $user_id, $remark, $status){
			$data = array(
				'complaint_id' => $id,
				'user_id' => $user_id,
				'remark' => $remark,
				'status' => $status
			);

			$this->db->insert('tbl_complaint_remarks', $data);
			$this->db->close();
            return true;
		}

		public function complaint_remarks_update($id, $user_id, $remark, $status){
			$data = array(
				'complaint_id' => $id,
				'user_id' => $user_id,
				'remark' => $remark,
				'status' => $status
			);

			$this->db->where('complaint_remark_id', $id);
			$this->db->update('tbl_complaint_remarks', $data);
			$this->db->close();
            return true;
		}

		public function complaint_remarks_delete($id)
		{
			$this->db->where('complaint_remark_id', $id);
			$this->db->delete('tbl_complaint_remarks');
			return true;
		}

    }

?>

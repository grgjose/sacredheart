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

        public function receiver_insert($fname, $mname, $lname, $age, $current_job, $date_to_receive, $is_received){
			$data = array(
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'age' => $age,
				'current_job' => $current_job,
				'date_to_receive' => $date_to_receive,
				'is_received' => $is_received,
			);

			$this->db->insert('tbl_receivers', $data);
			$this->db->close();
            return true;
        }

		public function receiver_update($receiver_id, $fname, $mname, $lname, $age, $current_job, $date_to_receive, $is_received){
			$data = array(
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'age' => $age,
				'current_job' => $current_job,
				'date_to_receive' => $date_to_receive,
				'is_received' => $is_received,
			);

			$this->db->where('receiver_id', $receiver_id);
			$this->db->update('tbl_receivers', $data);
			$this->db->close();
            return true;
        }

		public function receiver_delete($receiver_id){

			$this->db->where('receiver_id', $receiver_id);
			$this->db->delete('tbl_receivers');
			$this->db->close();
            return true;
        }

  }

?>

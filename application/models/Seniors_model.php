<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seniors_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function senior_retrieve($senior_id = null){
			if($senior_id !== null) { $this->db->where('senior_id', $senior_id); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_seniors');
            $this->db->close();
            return $query->result();
        }

		public function senior_insert($fname, $mname, $lname, $age, $job, $senior_card_id, $year){
			$data = array(
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'age' => $age,
				'job' => $job,
				'year' => $year,
				'senior_card_id' => $senior_card_id,
			);

			$this->db->insert('tbl_seniors', $data);
			$this->db->close();
            return true;
        }

		public function senior_update($senior_id, $fname, $mname, $lname, $age, $job, $senior_card_id, $year){
			$data = array(
				'fname' => $fname,
				'mname' => $mname,
				'lname' => $lname,
				'age' => $age,
				'job' => $job,
				'year' => $year,
				'senior_card_id' => $senior_card_id,
			);

			$this->db->where('senior_id', $senior_id);
			$this->db->update('tbl_seniors', $data);
			$this->db->close();
            return true;
        }

		public function senior_delete($senior_id){

			$this->db->where('senior_id', $senior_id);
			$this->db->delete('tbl_seniors');
			$this->db->close();
            return true;
        }

  }

?>

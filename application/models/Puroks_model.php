<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puroks_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    


		// tbl_puroks
		public function purok_retrieve($id = null){
			if($id !== null) { $this->db->where('purok_id', $id); }
			//$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_puroks');
            $this->db->close();
            return $query->result();
        }

		public function purok_insert($purok_name){
			$data = array(
				'purok_name' => $purok_name
			);

			$this->db->insert('tbl_puroks', $data);
			$this->db->close();
            return true;
        }

		public function purok_delete($id){

			$this->db->where('purok_id', $id);
			$this->db->delete('tbl_puroks');
			$this->db->where('purok_id', $id);
			$this->db->delete('tbl_households');
			$this->db->close();
            return true;
        }

		// tbl_households
		public function household_retrieve($id = null){
			if($id !== null) { $this->db->where('household_id', $id); }
			//$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_households');
            $this->db->close();
            return $query->result();
        }

		public function household_insert($purok_id, $household_name){
			$data = array(
				'purok_id' => $purok_id,
				'household_name' => $household_name
			);

			$this->db->insert('tbl_households', $data);
			$this->db->close();
            return true;
        }

		public function household_delete($id){

			$this->db->where('household_id', $id);
			$this->db->delete('tbl_households');

			$this->db->close();
            return true;
        }


  }

?>

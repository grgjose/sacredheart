<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function log_retrieve($senior_id = null){
			if($senior_id !== null) { $this->db->where('senior_id', $senior_id); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_logs');
            $this->db->close();
            return $query->result();
        }

		public function log_insert($log_info){
			$data = array(
				'log_info' => $log_info
			);

			$this->db->insert('tbl_logs', $data);
			$this->db->close();
            return true;
        }

  }

?>

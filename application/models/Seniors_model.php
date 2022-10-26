<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seniors_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function senior_retrieve($senior_id = null){
			if($senior_id !== null) { $this->db->where('senior_id', $senior_id); }
            $query = $this->db->get('tbl_seniors');
            $this->db->close();
            return $query->result();
        }

  }

?>

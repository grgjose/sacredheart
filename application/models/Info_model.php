<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function info_retrieve(){
            $query = $this->db->get('tbl_info');
            $this->db->close();
            return $query->result();
        }

		public function info_update($data){
			$this->db->where('info_id', 1);
			$this->db->update('tbl_info', $data);
			$this->db->close();
            return true;
        }

  }

?>

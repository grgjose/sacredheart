<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Replies_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function reply_retrieve($reply_id = null){
			if($reply_id !== null) { $this->db->where('reply_id', $reply_id); }
            $query = $this->db->get('tbl_replies');
            $this->db->close();
            return $query->result();
        }

  }

?>

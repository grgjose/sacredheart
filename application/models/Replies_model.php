<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Replies_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function reply_retrieve($reply_id = null){
			if($reply_id !== null) { $this->db->where('reply_id', $reply_id); }
			//$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_replies');
            $this->db->close();
            return $query->result();
        }

		public function reply_insert($reply, $reply_from){

			$data = array(
				'reply' => $reply,
				'reply_from' => $reply_from
			);

			$this->db->insert('tbl_replies', $data);
			$this->db->close();
            return true;
		}


		public function reply_update($id, $reply_suggested){

			$data = array(
				'reply_suggested' => $reply_suggested
			);

			$this->db->where('reply_id', $id);
			$this->db->update('tbl_replies', $data);
			$this->db->close();
            return true;
		}

  }

?>

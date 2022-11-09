<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		public function project_retrieve($project_id = null){
			if($project_id !== null) { $this->db->where('project_id', $project_id); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_projects');
            $this->db->close();
            return $query->result();
        }

  }

?>

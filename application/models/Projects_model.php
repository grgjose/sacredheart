<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {
        
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }    

		// c *R u d
		public function project_retrieve($id = null){	
			if($id !== null) { $this->db->where('project_id', $id); }
			$this->db->order_by('date_created', 'DESC');
            $query = $this->db->get('tbl_projects');
            $this->db->close();
            return $query->result();
        }

		// *C r u d
		public function project_insert($project_title, $project_date, $project_details, $project_userfile, $user_id, $official_id){ 	
			$data = array(
				'project_title' => $project_title,
				'project_date' => $project_date,
				'project_details' => $project_details,
				'project_userfile' => $project_userfile,
				'user_id' => $user_id,
				'official_id' => $official_id
			);

			$this->db->insert('tbl_projects', $data);
			$this->db->close();
            return true;
        }

		// c r *U d
		public function project_update($id, $project_title, $project_date, $project_details, $project_userfile, $user_id, $official_id){
			$data = array(
				'project_title' => $project_title,
				'project_date' => $project_date,
				'project_details' => $project_details,
				'project_userfile' => $project_userfile,
				'user_id' => $user_id,
				'official_id' => $official_id
			);

			$this->db->where('project_id', $id);
			$this->db->update('tbl_projects', $data);
			$this->db->close();
            return true;
        }

		// c r u *D
		public function project_delete($id = null){
			$this->db->where('project_id', $id);
			$this->db->delete('tbl_projects');
			$this->db->close();
            return true;
        }

		// c r *U d
		public function project_archive($id, $val){
			$data = array(
				'archive' => $val
			);

			$this->db->where('project_id', $id);
			$this->db->update('tbl_projects', $data);
			$this->db->close();
            return true;
        }

  }

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Dashboard (Shows Admin Page)

	public function index(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			//Model
			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();
			$data['complaints'] = $this->complaints_model->complaint_retrieve();
			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['assistance_types'] = $this->assistance_model->assistance_types_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			//View
			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	// Ayuda Receivers

	public function ayuda_receivers(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['receivers'] = $this->receivers_model->receiver_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/ayuda', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function add_receiver(){
		
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$age = $this->input->post('age');
		$current_job = $this->input->post('current_job');
		$date_to_receive = $this->input->post('date_to_receive');
		$is_received = $this->input->post('is_received');

		$this->logs_model->log_insert($fname.' '. $lname .' Receiver is Added. ');
		$this->receivers_model->receiver_insert($fname, $mname, $lname, $age, $current_job, $date_to_receive, $is_received);

		$success = $fname . " is Added Successfully!";
		$this->session->set_userdata('success' , $success);

		redirect('/admin/ayuda_receivers', 'refresh');
	}

	public function update_receiver(){
		
		$receiver_id = $this->input->post('receiver_id');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$age = $this->input->post('age');
		$current_job = $this->input->post('current_job');
		$date_to_receive = $this->input->post('date_to_receive');
		$is_received = $this->input->post('is_received');

		$this->logs_model->log_insert($fname.' '. $lname .' Receiver is Updated. ');
		$this->receivers_model->receiver_update($receiver_id, $fname, $mname, $lname, $age, $current_job, $date_to_receive, $is_received);

		$success = $fname . " is Updated Successfully!";
		$this->session->set_userdata('success' , $success);

		redirect('/admin/ayuda_receivers', 'refresh');
	}

	public function delete_receiver(){

		$receiver_id = $this->input->post('receiver_id');
		$fname = $this->input->post('fname');


		$this->receivers_model->receiver_delete($receiver_id);

		$success = $fname . " is Deleted Successfully!";


		$this->logs_model->log_insert($success);
		$this->session->set_userdata('success' , $success);

		redirect('/admin/ayuda_receivers', 'refresh');
	}

	// Senior Citizens

	public function senior_citizens(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['seniors'] = $this->seniors_model->senior_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/senior', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function add_senior(){
		
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$age = $this->input->post('age');
		$job = $this->input->post('job');
		$senior_card_id = $this->input->post('senior_card_id');

		$this->logs_model->log_insert($fname. ' '.$lname.' is an added senior citizen');
		$this->seniors_model->senior_insert($fname, $mname, $lname, $age, $job, $senior_card_id);

		$success = $fname . " is Added Successfully!";
		$this->session->set_userdata('success' , $success);

		redirect('/admin/senior_citizens', 'refresh');
	}

	public function update_senior(){
		
		$senior_id = $this->input->post('senior_id');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$age = $this->input->post('age');
		$job = $this->input->post('job');
		$senior_card_id = $this->input->post('senior_card_id');

		$this->logs_model->log_insert($fname. ' '.$lname.' is an updated senior citizen');
		$this->seniors_model->senior_update($senior_id, $fname, $mname, $lname, $age, $job, $senior_card_id);

		$success = $fname . " is Updated Successfully!";
		$this->session->set_userdata('success' , $success);

		redirect('/admin/senior_citizens', 'refresh');
	}

	public function delete_senior(){

		$senior_id = $this->input->post('senior_id');
		$fname = $this->input->post('fname');

		$this->seniors_model->senior_delete($senior_id);

		$success = $fname . " is Deleted Successfully!";
		$this->logs_model->log_insert($success);
		$this->session->set_userdata('success' , $success);

		redirect('/admin/senior_citizens', 'refresh');
	}

	// Projects

	public function projects(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');


			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();
			$data['users'] = $this->user_model->users_retrieve();
			
			$data['projects'] = $this->projects_model->project_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/projects', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function add_project(){
		
		// Collect POST Data
		$project_title = $this->input->post("project_title");
		$project_date = $this->input->post("project_date");
		$project_details = $this->input->post("project_details");
		$project_userfile = $this->input->post("project_userfile");
		$user_id = $this->session->userdata('user_id');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/projects/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('project_userfile'))
		{
			$project_userfile = $this->upload->data('file_name');
		}

		// Connect or Update Database
		$this->logs_model->log_insert($project_title.' project title is added');
		$this->projects_model->project_insert($project_title, $project_date, $project_details, $project_userfile, $user_id);

		// Notif
		$success = $project_title . " is Created Successfully!";
		$this->session->set_userdata('success' , $success);

		// Next Action
		redirect('/admin/projects', 'refresh');
	}

	public function update_project(){
		
	    // Collect POST Data
		$id = $this->input->post("id");
		$project_title = $this->input->post("project_title");
		$project_date = $this->input->post("project_date");
		$project_details = $this->input->post("project_details");
		$project_userfile = $this->input->post("project_userfile");
		$user_id = $this->session->userdata('user_id');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/projects/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('project_userfile'))
		{
			$project_userfile = $this->upload->data('file_name');
		}

		// Connect or Update Database
		$this->logs_model->log_insert($project_title.' project title is updated');
		$this->projects_model->project_update($id, $project_title, $project_date, $project_details, $project_userfile, $user_id);

		// Notif
		$success = $project_title . " is Updated Successfully!";
		$this->session->set_userdata('success' , $success);

		// Next Action
		redirect('/admin/projects', 'refresh');
	}

	public function delete_project(){

		// Collect POST Data
		$id = $this->input->post('id');

		// Connect or Update Database
		$this->projects_model->project_delete($id);

		// Notif
		$success = "Deleted Successfully!";
		$this->logs_model->log_insert($success.' from project');
		$this->session->set_userdata('success' , $success);

		// Next Action
		redirect('/admin/projects', 'refresh');
	}

	public function archive_project(){

		// Collect POST Data
		$id = $this->input->post('id');
		$val = 1; 

		$projects = $this->projects_model->project_retrieve();

		foreach($projects as $project){ 
			if($project->project_id == $id){ 
				if($project->archive == 1){ 
					$val = 0; 
				} else { 
					$val = 1; 
				} break; 
			}
		}

		// Connect or Update Database
		$this->projects_model->project_archive($id, $val);

		// Notif
		//$success = "Archived Successfully!";
		//$this->logs_model->log_insert($success.' from project');
		//$this->session->set_userdata('success' , $success);

		// Next Action
		redirect('/admin/projects', 'refresh');
	}

	// Chatbot

	public function chatbot(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['replies'] = $this->replies_model->reply_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/chatbot', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function add_chatbot_reply(){
		$reply = $this->input->post('reply');
		$reply_from = $this->input->post('reply_from');
		$this->replies_model->reply_insert($reply, $reply_from);

		$success = "Reply is Added";
		$this->session->set_userdata('success', $success);

		redirect('/admin/chatbot', 'refresh');
	}

	public function inc_chatbot_reply(){
		$id =  $this->input->post('id');
		$inc_reply = $this->input->post('inc_reply');

		$replies = $this->replies_model->reply_retrieve();
		foreach($replies as $reply){ if($reply->reply_id == $id){ $suggested = $reply->reply_suggested; break; }}
		
		$suggested = $suggested . "," . $inc_reply;

		$this->replies_model->reply_update(intval($id), $suggested);

		$success = "Reply ID: ". $id . " is now updated";
		$this->session->set_userdata('success', $success);

		redirect('/admin/chatbot', 'refresh');
	}

	public function dec_chatbot_reply(){
		$id =  $this->input->post('id');
		$dec_reply = $this->input->post('dec_reply');

		$replies = $this->replies_model->reply_retrieve();
		foreach($replies as $reply){ if($reply->reply_id == $id){ $suggested = $reply->reply_suggested; break; }}
		
		$arr = explode(',', $suggested); $suggested = ""; $ctr = 0;

		foreach($arr as $x){

			if($x != $dec_reply){
				if($ctr > 0) { $suggested = $suggested . ','; }
				$suggested = $suggested . $x;
			} $ctr = $ctr + 1;
		}

		$this->replies_model->reply_update($id, $suggested);

		$success = "Reply ID: ". $id . " is now updated";
		$this->session->set_userdata('success', $success);

		redirect('/admin/chatbot', 'refresh');

	}

	// Officials Tree (Infographics Purpose)

	public function officials_tree(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/officials', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function edit_official(){
		// Get Form Inputs
		$id = $this->input->post('id');
		$position = $this->input->post('position');
		$dp_userfile = $this->input->post('prev_dp_userfile');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/officials/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dp_userfile'))
		{
			$dp_userfile = $this->upload->data('file_name');
		}

		$success = "Official Updated";
		$this->session->set_userdata('success' , $success);

		$this->user_model->users_official_update($id, $position, $dp_userfile);

		redirect('/admin/officials_tree', 'refresh');
	}

	// Users List

	public function users_list(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/users', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function add_user(){

		// Get Form Inputs
		$password = $this->input->post('password');
		$usertype = $this->input->post('usertype');
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');
		$userfile = 'default.jpg';

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/users/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('userfile'))
		{
			$userfile = $this->upload->data('file_name');

		}
		
		$success = "User Created";
		$this->session->set_userdata('success' , $success);

		$this->user_model->users_insert($password, $usertype, $email, $fname, $mname, $lname, $address, $contact, $userfile, 2, '');

		redirect('/admin/users_list', 'refresh');
	}

	public function edit_user(){
		// Get Form Inputs
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$usertype = $this->input->post('usertype');
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');
		$userfile = $this->input->post('prev_userfile');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/users/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('userfile'))
		{
			$userfile = $this->upload->data('file_name');
		}

		$success = "User Updated";
		$this->session->set_userdata('success' , $success);

		$this->user_model->users_update($id, $password, $usertype, $email, $fname, $mname, $lname, $address, $contact, $userfile, 2, '');

		redirect('/admin/users_list', 'refresh');
	}

	public function delete_user(){
		$id = $this->input->post('id');

		$success = "User Deleted";
		$this->session->set_userdata('success' , $success);

		$this->user_model->users_delete($id);

		redirect('/admin/users_list', 'refresh');
	}

	// Services Table

	public function document_requests(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/requests', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function filed_complaints(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['complaints'] = $this->complaints_model->complaint_retrieve();
			$data['users'] = $this->user_model->users_retrieve();



			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/complaints', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function assistance_requests(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['assistance_types'] = $this->assistance_model->assistance_types_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/assistance', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function document_request_types(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/dr_types', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function assistance_request_types(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['assistance_types'] = $this->assistance_model->assistance_types_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/ar_types', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	// Services Table Actions

	public function set_status_as_approved(){
		$type = $this->input->post('type');
		$id = $this->input->post('id');
		$remarks = $this->input->post('remarks');

		if($type == "requests")
		{
			$this->logs_model->log_insert("approved a pending request");
			$this->requests_model->request_update($id, 1, $remarks);
			redirect('/admin/document_requests', 'refresh');
		}
		elseif($type == "complaints")
		{
			$this->logs_model->log_insert("approved a pending complaint");
			$this->complaints_model->complaint_update($id, 1, $remarks);
			redirect('/admin/filed_complaints', 'refresh');
		}
		elseif($type == "assistance")
		{
			$this->logs_model->log_insert("approved a pending assistance");
			$this->assistance_model->assistance_update($id, 1, $remarks);
			redirect('/admin/assistance_requests', 'refresh');
		}
	}

	public function set_status_as_pending(){
		$type = $this->input->post('type');
		$id = $this->input->post('id');
		$remarks = $this->input->post('remarks');

		if($type == "requests")
		{
			$this->requests_model->request_update($id, 0, $remarks);
			redirect('/admin/document_requests', 'refresh');
		}
		elseif($type == "complaints")
		{
			$this->complaints_model->complaint_update($id, 0, $remarks);
			redirect('/admin/filed_complaints', 'refresh');
		}
		elseif($type == "assistance")
		{
			$this->assistance_model->assistance_update($id, 0, $remarks);
			redirect('/admin/assistance_requests', 'refresh');
		}
	}

	public function add_dr_type(){
		$putaragis = $this->input->post('dr_type');
		$this->requests_model->request_types_insert($putaragis);
		redirect('/admin/document_request_types', 'refresh');
	}

	public function edit_dr_type(){
		$id = $this->input->post('id');
		$putaragis = $this->input->post('dr_type');
		$this->requests_model->request_types_update($id, $putaragis);
		redirect('/admin/document_request_types', 'refresh');
	}

	public function delete_dr_type(){
		$putaragis = $this->input->post('id');
		$this->requests_model->request_types_delete($putaragis);
		redirect('/admin/document_request_types', 'refresh');
	}

	public function add_ar_type(){
		$putaragis = $this->input->post('ar_type');
		$this->assistance_model->assistance_types_insert($putaragis);
		redirect('/admin/assistance_request_types', 'refresh');
	}

	public function edit_ar_type(){
		$id = $this->input->post('id');
		$putaragis = $this->input->post('ar_type');
		$this->assistance_model->assistance_types_update($id, $putaragis);
		redirect('/admin/assistance_request_types', 'refresh');
	}

	public function delete_ar_type(){
		$putaragis = $this->input->post('id');
		$this->assistance_model->assistance_types_delete($putaragis);
		redirect('/admin/assistance_request_types', 'refresh');
	}

	// Logs

	public function view_logs(){
		if($this->session->usertype != 1)
		{
			$error = "Access Denied!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'username'  => $this->session->userdata('username'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'userfile'  => $this->session->userdata('userfile'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['logs'] = $this->logs_model->log_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/logs', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

}

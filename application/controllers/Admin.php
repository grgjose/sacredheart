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
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/projects', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
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
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/plus/header', $data);
			$this->load->view('admin/chatbot', $data);
			$this->load->view('admin/plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
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
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/users/';
		$config['allowed_types']        = 'pdf|gif|jpg|png';
		$config['max_size']             = 100000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = "File Failed to Upload due to the following reasons" . $this->upload->display_errors();
			$this->session->set_userdata('error' , $error);
		}
		else
		{
			$this->user_model->users_insert( 'user_'.time(), $password, 3,
			$fname, $mname, $lname, $email, $address, $contact, $this->upload->data('file_name'));

			$success = "Registration Filed Successfully, Please wait for the Officials to Approve it";
			$this->session->set_userdata('success' , $success);
		}

		redirect('/home', 'refresh');
	}

	public function edit_user(){

	}

	public function delete_user(){

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
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

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
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

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

		if($type == "requests")
		{
			$this->requests_model->request_update($id, 1);
			redirect('/admin/document_requests', 'refresh');
		}
		elseif($type == "complaints")
		{
			$this->complaints_model->complaint_update($id, 1);
			redirect('/admin/filed_complaints', 'refresh');
		}
		elseif($type == "assistance")
		{
			$this->assistance_model->assistance_update($id, 1);
			redirect('/admin/assistance_requests', 'refresh');
		}
	}

	public function set_status_as_pending(){
		$type = $this->input->post('type');
		$id = $this->input->post('id');

		if($type == "requests")
		{
			$this->requests_model->request_update($id, 0);
			redirect('/admin/document_requests', 'refresh');
		}
		elseif($type == "complaints")
		{
			$this->complaints_model->complaint_update($id, 0);
			redirect('/admin/filed_complaints', 'refresh');
		}
		elseif($type == "assistance")
		{
			$this->assistance_model->assistance_update($id, 0);
			redirect('/admin/assistance_requests', 'refresh');
		}
	}

	public function add_dr_type(){
		$putaragis = $this->input->post('dr_type');
		$this->requests_model->request_types_insert($putaragis);
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

	public function delete_ar_type(){
		$putaragis = $this->input->post('id');
		$this->assistance_model->assistance_types_delete($putaragis);
		redirect('/admin/assistance_request_types', 'refresh');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Defeault Function (Shows Admin Page)
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

			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();
			$data['complaints'] = $this->complaints_model->complaint_retrieve();
			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/dashboard', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

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

			$this->load->view('admin/ayuda', $data);

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

			$this->load->view('admin/senior', $data);

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

			$this->load->view('admin/projects', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function chatbot(){

	}

	public function officials_tree(){

	}

	public function users_list(){

	}

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
			$data['complaints'] = $this->complaints_model->complaint_retrieve();
			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('admin/requests', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function filed_complaints(){

	}

	public function assistance_requests(){

	}

}

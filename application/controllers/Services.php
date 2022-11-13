<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Defeault Function (Shows Admin Page)
	public function index()
	{
		if($this->session->usertype != 1)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$this->load->view('plus/header', $data);
			$this->load->view('home', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}


	public function request_document(){

		if($this->session->logged_in == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$this->load->view('plus/header', $data);
			$this->load->view('services/request', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function upload_request(){

		if($this->session->logged_in == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$doc_type = $this->input->post('doctype');
			$purpose = $this->input->post('purpose');
			$date_needed = $this->input->post('docdate');

			$this->requests_model->request_insert($this->session->userdata('user_id'), $doc_type, $purpose, $date_needed);
			$this->session->set_userdata('success', 'Request Created. Please wait for 1-2 Working Days.');

			redirect('/home', 'refresh');
		}
	}

	public function file_complaint()
	{
		if($this->session->logged_in == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$this->load->view('plus/header', $data);
			$this->load->view('services/complaint', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function upload_complaint()
	{
		if($this->session->userdata('logged_in') == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$description = $this->input->post('description');
			
			// Upload ID to a Path
			$config['upload_path']          = './assets/files/registration/';
			$config['allowed_types']        = '*';
			$config['max_size']             = 1000000000;
			$config['file_name']			= time();

			$this->load->library('upload', $config);	

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = "File Failed to Upload due to the following reasons" . $this->upload->display_errors();
				$this->session->set_userdata('error' , $error);
			}
			else
			{
				$this->complaints_model->complaint_insert( $this->session->userdata('user_id'), $description, $this->upload->data('file_name'));

				$success = "Complaint Created. Please wait for the response. Thank you!";
				$this->session->set_userdata('success' , $success);
			}

			redirect('/home', 'refresh');
		}
	}


	public function assistance(){

		if($this->session->logged_in == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in')
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$this->load->view('plus/header', $data);
			$this->load->view('services/assistance', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}


	public function upload_assistance()
	{
		if($this->session->userdata('logged_in') == false)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$asst_type = $this->input->post('asst_type');
			$purpose = $this->input->post('purpose');
			$date_needed = $this->input->post('date_needed');

			$this->assistance_model->assistance_insert($this->session->userdata('user_id'), $asst_type, $purpose, $date_needed);
			$this->session->set_userdata('success', 'Assistance Created. Please wait for 1-2 Working Days.');

			redirect('/home', 'refresh');
		}
	}

}

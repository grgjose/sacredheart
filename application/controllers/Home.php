<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Defeault Function (Shows Homepage)
	public function index()
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

		$this->load->view('plus/header', $data);
		$this->load->view('home', $data);
		$this->load->view('plus/footer', $data);

		$this->session->unset_userdata('error');
		$this->session->unset_userdata('success');
	}

	// Login Function
	public function login()
	{

		// Get Email & Password Inputs
		$mail = $this->input->post('email');
		$pass = $this->input->post('password');
		$verified = false;

		// Verify Inputs
		$users = $this->user_model->users_retrieve();

		foreach($users as $user)
		{
			if (($mail == $user->email) && ($pass == $user->password) && ($user->approved == 1))
			{

				$newdata = array(
						'username'  => $user->username,
						'usertype'  => $user->usertype,
						'email'     => $user->email,
						'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				$verified = true;
			}
		}

		// Verification Result
		if($verified == false)
		{
			$error = "Wrong Email or Password! Try again!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		elseif($this->session->usertype == 1)
		{
			
		}
		else 
		{
			redirect('/home', 'refresh');
		}

	}

	// Logout Function
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logged_in');
		redirect('/home', 'refresh');
	}

	// Reset Password Function
	public function reset()
	{
		$newdata = array(
			'username'  => $this->session->userdata('username'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in')
		);

		$data['user'] = $newdata;

		$this->load->view('plus/header', $data);
		$this->load->view('reset', $data);
		$this->load->view('plus/footer', $data);
	}

	public function reset_password()
	{
		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();

		$mail->isSMTP();
		$mail->Host = 'ssl://smtp.gmail.com';
		$mail->SMPTAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465; //465 or 587

		$mail->Username = 'georgelouisjose@gmail.com';
		$mail->Password = 'besldfwobwscqfoy';

		$mail->setFrom('georgelouisjose@gmail.com',);
		$mail->addAddress('georgelouisjose@gmail.com');

		$mail->isHTML(TRUE);
		$mail->Subject = 'Reset Password';
		$mail->Body =  "<h1>Test</h1>";

		if(!$mail->send()){
			echo 'Mailer Error: '.$mail->ErrorInfo;
		} else{
			echo 'check mail';
		}

		$mail->smtpClose();

	}

	// Register Function
	public function register()
	{
		$newdata = array(
			'username'  => $this->session->userdata('username'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in')
		);

		$data['user'] = $newdata;

		$this->load->view('plus/header', $data);
		$this->load->view('register', $data);
		$this->load->view('plus/footer', $data);
	}

	public function register_user()
	{
		// Get Form Inputs
		$password = $this->input->post('password');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/registration/';
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
			$fname, $mname, $lname, $email, $address, $contact, $config['file_name']);

			$success = "Registration Filed Successfully, Please wait for the Officials to Approve it";
			$this->session->set_userdata('success' , $success);
		}

		redirect('/home', 'refresh');

	}

	// About Function
	// Shows more about Barangay Profile
	public function about()
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

		$this->load->view('plus/header', $data);
		$this->load->view('about', $data);
		$this->load->view('plus/footer', $data);

		$this->session->unset_userdata('error');
		$this->session->unset_userdata('success');
	}

	// Contact Function
	// Shows more about Barangay Contact Personnel
	public function contact()
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

		$this->load->view('plus/header', $data);
		$this->load->view('contact', $data);
		$this->load->view('plus/footer', $data);

		$this->session->unset_userdata('error');
		$this->session->unset_userdata('success');
	}
}

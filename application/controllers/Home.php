<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Defeault Function (Shows Homepage)
	public function index(){
		$this->session->set_userdata('chatbot_replies', '2');
		
		$notif_count = 0;

		if($this->session->userdata('logged_in') != null){
			$complaints = $this->complaints_model->complaint_retrieve();
			$assistance = $this->assistance_model->assistance_retrieve();
			$requests = $this->requests_model->request_retrieve();

			foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
			foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
			foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
		}

		$data['notif_count'] = $notif_count;

		$newdata = array(
			'user_id'  => $this->session->userdata('user_id'),
			'username'  => $this->session->userdata('username'),
			'fname'  => $this->session->userdata('fname'),
			'mname'  => $this->session->userdata('mname'),
			'lname'  => $this->session->userdata('lname'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in'),
			'notif_count' => $notif_count
		);

		$data['user'] = $newdata;
		$data['error'] = $this->session->userdata('error');
		$data['success'] = $this->session->userdata('success');
		
		$data['info'] = $this->get_info();

		$data['projects'] = $this->projects_model->project_retrieve();
		$data['users'] = $this->user_model->users_retrieve();
		$data['replies'] = $this->replies_model->reply_retrieve();



		$this->load->view('plus/header', $data);
		$this->load->view('home', $data);
		$this->load->view('plus/footer', $data);

		$this->session->unset_userdata('error');
		$this->session->unset_userdata('success');
	}

	// Login Function
	public function login(){

		// Get Email & Password from UI
		$mail = $this->input->post('email');
		$pass = $this->input->post('password');
		$verified = false;

		// Verify Email & Password from Database
		$users = $this->user_model->users_retrieve();

		foreach($users as $user)
		{
			if (($mail == $user->email) && ($pass == $user->password) && ($user->approved == 2))
			{

				$newdata = array(
						'user_id'  => $user->user_id,
						'username'  => $user->username,
						'fname'  =>$user->fname,
						'mname'  => $user->mname,
						'lname'  => $user->lname,
						'usertype'  => $user->usertype,
						'email'     => $user->email,
						'userfile'     => $user->userfile,
						'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				$verified = true;
			}
		}

		// Reload Webpage based on Verification Result
		if($verified == false)
		{
			$error = "Wrong Email or Password! Try again!";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		elseif($this->session->usertype == 1)
		{
			redirect('/admin', 'refresh');
		}
		else 
		{
			$this->logs_model->log_insert($newdata['user_id'].' just logged in');
			redirect('/home', 'refresh');
		}

	}

	// Logout Function
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('mname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logged_in');
		redirect('/home', 'refresh');
	}

	// Reset Password Function
	public function reset()
	{
		$notif_count = 0;

		if($this->session->userdata('logged_in') != null){
			$complaints = $this->complaints_model->complaint_retrieve();
			$assistance = $this->assistance_model->assistance_retrieve();
			$requests = $this->requests_model->request_retrieve();

			foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
			foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
			foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
		}

		$data['notif_count'] = $notif_count;

		$newdata = array(
			'user_id'  => $this->session->userdata('user_id'),
			'username'  => $this->session->userdata('username'),
			'fname'  => $this->session->userdata('fname'),
			'mname'  => $this->session->userdata('mname'),
			'lname'  => $this->session->userdata('lname'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in'),
			'notif_count' => $notif_count
		);

		$data['user'] = $newdata;
		$data['info'] = $this->get_info();

		$this->load->view('plus/header', $data);
		$this->load->view('reset', $data);
		$this->load->view('plus/footer', $data);
	}

	public function reset_password()
	{

		$myEmail = $this->input->post('email');

		//Generate Verification Code
		$letters='abcdefghijklmnopqrstuvwxyz';			// a-z
		$string='';										// declare empty string
		for($x=0; $x<3; ++$x){							// loop three times
			$string.=$letters[rand(0,25)].rand(0,9);	// concatenate one letter then one number
		}

		$this->user_model->users_update_verification_code($string, $myEmail);

		$this->load->library('mailer');
		$mail = $this->mailer->load();

		$mail->isSMTP();

		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; //ssl or tls
		$mail->Port = 587; //465 or 587

		$mail->Username = 'kendrickmallare.km@gmail.com';
		$mail->Password = 'pofemwkzevfsjpvs';

		$mail->setFrom('no-reply-sacredheart@gmail.com');
		$mail->addAddress($myEmail);

		$message = "<p>Good Day!</p>" 
		         . "<p>I am one of the Developers of the Sacred Heart Barangay Information System.</p>"
				 . "<p>Please use the link below for the Password Reset!</p>"
				 . "<p>Link: ". base_url() . "home/reset_password_now/" . $string . "</p>"
				 . "<br><br>"
				 . "<p>Thank you!</p>"
				 . "<p>Kendrick Lamar</p>"
				 . "<p>Software Developer</p>";

		$mail->isHTML(TRUE);
		$mail->Subject = 'Reset Password';
		$mail->Body =  $message;

		if(!$mail->send()){
			$error = 'Mailer Error: '.$mail->ErrorInfo;
			$this->session->set_userdata('error' , $error);
		} else{
			$success = "Please check your email for the reset password link. Thanks!";
			$this->session->set_userdata('success' , $success);
		}

		$mail->smtpClose();

		redirect('/home', 'refresh');
	}

	public function reset_password_now($code = null)
	{
		if($code == null){
			$error = "Invalid Link!";
			$this->session->set_userdata('error' , $error);
			redirect('/home', 'refresh');
		} else {

			$notif_count = 0;

			if($this->session->userdata('logged_in') != null){
				$complaints = $this->complaints_model->complaint_retrieve();
				$assistance = $this->assistance_model->assistance_retrieve();
				$requests = $this->requests_model->request_retrieve();

				foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
				foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
				foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
			}

			$data['notif_count'] = $notif_count;

			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in'),
				'notif_count' => $notif_count
			);

			$data['user'] = $newdata;
			$data['info'] = $this->get_info();

			$users = $this->user_model->users_retrieve();

			foreach($users as $user)
			{
				if($user->verification_code == $code)
				{
					$data['email'] = $user->email;
				}
			}
			$this->load->view('plus/header', $data);
			$this->load->view('reset_form', $data);
			$this->load->view('plus/footer', $data);
		}
	}

	public function reset_form_submit()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$code = "";

		$this->user_model->users_update_password($password, $code, $email);

		$success = "Please try your email and new password. Thanks!";
		$this->session->set_userdata('success' , $success);
		redirect('/home', 'refresh');
	}

	// Register Function
	public function register()
	{
		$notif_count = 0;

		if($this->session->userdata('logged_in') != null){
			$complaints = $this->complaints_model->complaint_retrieve();
			$assistance = $this->assistance_model->assistance_retrieve();
			$requests = $this->requests_model->request_retrieve();

			foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
			foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
			foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
		}

		$data['notif_count'] = $notif_count;

		$newdata = array(
			'user_id'  => $this->session->userdata('user_id'),
			'username'  => $this->session->userdata('username'),
			'fname'  => $this->session->userdata('fname'),
			'mname'  => $this->session->userdata('mname'),
			'lname'  => $this->session->userdata('lname'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in'),
			'notif_count' => $notif_count
		);

		$data['user'] = $newdata;
		$data['info'] = $this->get_info();
		
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
		$config['allowed_types']        = '*';
		$config['max_size']             = 10000000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = "File Failed to Upload due to the following reasons" . $this->upload->display_errors();
			$this->session->set_userdata('error' , $error);
		}
		else
		{

			$this->user_model->users_insert($password, 3, $email, $fname, $mname, $lname, $address, $contact, 'default.jpg', 0, $this->upload->data('file_name'));

			$success = "Registration Filed Successfully, Please wait for the Officials to Approve it";
			$this->session->set_userdata('success' , $success);

			$myEmail = $email;

			//Generate Verification Code
			$letters='abcdefghijklmnopqrstuvwxyz';			// a-z
			$string='';										// declare empty string
			for($x=0; $x<3; ++$x){							// loop three times
				$string.=$letters[rand(0,25)].rand(0,9);	// concatenate one letter then one number
			}

			$this->user_model->users_update_validation_code($string, $myEmail);

			$this->load->library('mailer');
			$mail = $this->mailer->load();

			$mail->isSMTP();

			$mail->Host = "smtp.gmail.com";
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls'; //ssl or tls
			$mail->Port = 587; //465 or 587

			$mail->Username = 'kendrickmallare.km@gmail.com';
			$mail->Password = 'pofemwkzevfsjpvs';

			$mail->setFrom('no-reply-sacredheart@gmail.com');
			$mail->addAddress($myEmail);

			$message = "<p>Good Day!</p>" 
					 . "<p>I am one of the Developers of the Sacred Heart Barangay Information System.</p>"
					 . "<p>Please use the link to validate your email regarding Registration!</p>"
					 . "<p>Link: ". base_url() . "home/validate_email/" . $string . "</p>"
					 . "<br><br>"
					 . "<p>Thank you!</p>"
					 . "<p>Kendrick Lamar</p>"
					 . "<p>Software Developer</p>";

			$mail->isHTML(TRUE);
			$mail->Subject = 'Email Validation';
			$mail->Body =  $message;

			if(!$mail->send()){
				$error = 'Mailer Error: '.$mail->ErrorInfo;
				$this->session->set_userdata('error' , $error);
			} else{
				$success = "Please check your email for the email validation link. Thanks!";
				$this->session->set_userdata('success' , $success);
			}

			$mail->smtpClose();

		}

		redirect('/home', 'refresh');
	}

	public function validate_email($code = null)
	{
		if($code == null){
			$error = "Invalid Link!";
			$this->session->set_userdata('error' , $error);
			redirect('/home', 'refresh');
		} else {

			$notif_count = 0;

			if($this->session->userdata('logged_in') != null){
				$complaints = $this->complaints_model->complaint_retrieve();
				$assistance = $this->assistance_model->assistance_retrieve();
				$requests = $this->requests_model->request_retrieve();

				foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
				foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
				foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
			}

			$data['notif_count'] = $notif_count;

			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in'),
				'notif_count' => $notif_count
			);

			$data['user'] = $newdata;
			$data['info'] = $this->get_info();

			$users = $this->user_model->users_retrieve();

			foreach($users as $user)
			{
				if($user->validation_code == $code)
				{
					$this->user_model->users_update_approve(1, $user->email); break;
				}
			}

			$success = "Email Verified, Please wait for the Officials to Approve your Registration! Thanks!";
			$this->session->set_userdata('success' , $success);

			redirect('/home', 'refresh');
		}
	}


	// About Function
	// Shows more about Barangay Profile
	public function about()
	{
		$notif_count = 0;

		if($this->session->userdata('logged_in') != null){
			$complaints = $this->complaints_model->complaint_retrieve();
			$assistance = $this->assistance_model->assistance_retrieve();
			$requests = $this->requests_model->request_retrieve();

			foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
			foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
			foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
		}

		$data['notif_count'] = $notif_count;

		$newdata = array(
			'user_id'  => $this->session->userdata('user_id'),
			'username'  => $this->session->userdata('username'),
			'fname'  => $this->session->userdata('fname'),
			'mname'  => $this->session->userdata('mname'),
			'lname'  => $this->session->userdata('lname'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in'),
			'notif_count' => $notif_count
		);

		$data['user'] = $newdata;
		$data['error'] = $this->session->userdata('error');
		$data['success'] = $this->session->userdata('success');

		$data['users'] = $this->user_model->users_retrieve();
		$data['info'] = $this->get_info();

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
		$notif_count = 0;

		if($this->session->userdata('logged_in') != null){
			$complaints = $this->complaints_model->complaint_retrieve();
			$assistance = $this->assistance_model->assistance_retrieve();
			$requests = $this->requests_model->request_retrieve();

			foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
			foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
			foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
		}

		$data['notif_count'] = $notif_count;

		$newdata = array(
			'user_id'  => $this->session->userdata('user_id'),
			'username'  => $this->session->userdata('username'),
			'fname'  => $this->session->userdata('fname'),
			'mname'  => $this->session->userdata('mname'),
			'lname'  => $this->session->userdata('lname'),
			'usertype'  => $this->session->userdata('usertype'),
			'email'     => $this->session->userdata('email'),
			'logged_in' => $this->session->userdata('logged_in'),
			'notif_count' => $notif_count
		);

		$data['user'] = $newdata;
		$data['error'] = $this->session->userdata('error');
		$data['success'] = $this->session->userdata('success');

		$data['info'] = $this->get_info();

		$this->load->view('plus/header', $data);
		$this->load->view('contact', $data);
		$this->load->view('plus/footer', $data);

		$this->session->unset_userdata('error');
		$this->session->unset_userdata('success');
	}

	public function my_info(){
		if($this->session->userdata('usertype') == 1)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$notif_count = 0;

			if($this->session->userdata('logged_in') != null){
				$complaints = $this->complaints_model->complaint_retrieve();
				$assistance = $this->assistance_model->assistance_retrieve();
				$requests = $this->requests_model->request_retrieve();

				foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
				foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
				foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
			}

			$data['notif_count'] = $notif_count;

			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in'),
				'notif_count' => $notif_count
			);

			$info = $this->user_model->users_retrieve($this->session->userdata('user_id'));

			$data['profile'] = array(
				'user_id' => $info[0]->user_id,
				'username' => $info[0]->username,
				'password' => $info[0]->password,
				'usertype' => $info[0]->usertype,
				'email' => $info[0]->email,
				'fname' => $info[0]->fname,
				'mname' => $info[0]->mname,
				'lname' => $info[0]->lname,
				'address' => $info[0]->address,
				'contact' => $info[0]->contact,
				'userfile' => $info[0]->userfile,
				'approved' => $info[0]->approved,
				'date_created' => $info[0]->date_created
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['info'] = $this->get_info();

			$data['complaints'] = $this->complaints_model->complaint_retrieve($this->session->userdata('user_id'));
			$data['requests'] = $this->requests_model->request_retrieve($this->session->userdata('user_id'));
			$data['request_types'] = $this->requests_model->request_types_retrieve();
			$data['assistance'] = $this->assistance_model->assistance_retrieve($this->session->userdata('user_id'));
			$data['assistance_types'] = $this->assistance_model->assistance_types_retrieve();

			$this->complaints_model->complaint_seen($this->session->userdata('user_id'));
			$this->requests_model->request_seen($this->session->userdata('user_id'));
			$this->assistance_model->assistance_seen($this->session->userdata('user_id'));

			$this->load->view('plus/header', $data);
			$this->load->view('my_info', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function edit_info(){

		if($this->session->usertype != 3)
		{
			$error = "Register or Login First";
			$this->session->set_userdata('error' , $error);

			redirect('/home', 'refresh');
		}
		else
		{
			$notif_count = 0;

			if($this->session->userdata('logged_in') != null){
				$complaints = $this->complaints_model->complaint_retrieve();
				$assistance = $this->assistance_model->assistance_retrieve();
				$requests = $this->requests_model->request_retrieve();

				foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $notif_count = $notif_count + 1; }}
				foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $notif_count = $notif_count + 1; }}
				foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $notif_count = $notif_count + 1; }}
			}

			$data['notif_count'] = $notif_count;

			$newdata = array(
				'user_id'  => $this->session->userdata('user_id'),
				'username'  => $this->session->userdata('username'),
				'fname'  => $this->session->userdata('fname'),
				'mname'  => $this->session->userdata('mname'),
				'lname'  => $this->session->userdata('lname'),
				'usertype'  => $this->session->userdata('usertype'),
				'email'     => $this->session->userdata('email'),
				'logged_in' => $this->session->userdata('logged_in'),
				'notif_count' => $notif_count
			);

			$info = $this->user_model->users_retrieve($this->session->userdata('user_id'));

			$data['profile'] = array(
				'user_id' => $info[0]->user_id,
				'username' => $info[0]->username,
				'password' => $info[0]->password,
				'usertype' => $info[0]->usertype,
				'email' => $info[0]->email,
				'fname' => $info[0]->fname,
				'mname' => $info[0]->mname,
				'lname' => $info[0]->lname,
				'address' => $info[0]->address,
				'contact' => $info[0]->contact,
				'userfile' => $info[0]->userfile,
				'approved' => $info[0]->approved,
				'date_created' => $info[0]->date_created
			);

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['info'] = $this->get_info();

			$this->load->view('plus/header', $data);
			$this->load->view('profile', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}

	}

	public function update_info(){

		$type = $this->input->post('type');
		
		$users = $this->user_model->users_retrieve();

		foreach($users as $user){
			if($user->user_id == $this->session->userdata('user_id')){

				$id = intval(trim($user->user_id));
				$password = $user->password;
				if($type == "password"){ $password = $this->input->post('password'); }
				$usertype = $user->usertype;

				$email = $user->email;
				if($type == "email"){ $email = $this->input->post('email'); }

				$fname = $user->fname;
				if($type == "fname"){ $fname = $this->input->post('fname'); }

				$mname = $user->mname;
				if($type == "mname"){ $mname = $this->input->post('mname'); }
				
				$lname = $user->lname;
				if($type == "lname"){ $lname = $this->input->post('lname'); }
				
				$address = $user->address;
				if($type == "address"){ $address = $this->input->post('address'); }
				
				$contact = $user->contact;
				if($type == "contact"){ $contact = $this->input->post('contact'); }
				
				$userfile = $user->userfile;
				$approved = $user->approved;
				$reg_userfile = $user->reg_userfile;
				
				break;
			}
		}

		$this->user_model->users_update($id, $password, $usertype, $email, $fname, $mname, $lname, $address, $contact, $userfile, $approved, $reg_userfile);

		$success = "Data Edited Successfully";
		$this->session->set_userdata('success' , $success);

		redirect('/home/edit_info', 'refresh');
	}

	public function edit_profile_picture(){
		
		$id = $this->input->post('id');
		
		// Upload ID to a Path
		$config['upload_path']          = './assets/files/users/';
		$config['allowed_types']        = 'pdf|gif|jpg|png';
		$config['max_size']             = 100000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('userfile'))
		{
			$userfile = $this->upload->data('file_name');
			$success = "Profile Picture Edited Successfully";
			$this->session->set_userdata('success' , $success);
		}

		$this->user_model->users_update_userfile($id, $userfile);



		redirect('/home/edit_info', 'refresh');
	}

	public function get_info(){
		$result = $this->info_model->info_retrieve();

		foreach($result as $r){
			$myArr['logo'] = $r->info_logo;
			$myArr['adv_logo'] = $r->info_adv_logo;
			$myArr['mission'] = $r->info_mission;
			$myArr['vision'] = $r->info_vision;
			$myArr['gmap'] = $r->info_gmap;
			$myArr['location'] = $r->info_location;
			$myArr['number1'] = $r->info_number1;
			$myArr['number2'] = $r->info_number2;
			$myArr['home_userfile'] = $r->info_home_userfile;
			$myArr['home_tagline'] = $r->info_home_tagline;
			$myArr['home_greetings'] = $r->info_home_greetings;
			$myArr['youtube_link'] = $r->info_youtube_link;
			$myArr['about_userfile1'] = $r->info_about_userfile1;
			$myArr['about_userfile2'] = $r->info_about_userfile2;
			$myArr['about_userfile3'] = $r->info_about_userfile3;
		}

		return $myArr;

	}

	public function get_chatbot_replies(){
		$data['chatbot_replies'] = $this->session->userdata('chatbot_replies');
		$data['replies'] = $this->replies_model->reply_retrieve();
		$this->load->view('plus/chatbot', $data);
	}

	public function set_chatbot_reply($reply_id = null){

		$x = $this->session->userdata('chatbot_replies');
		$x = $x . ',' . $reply_id;

		$replies = $this->replies_model->reply_retrieve();

		foreach($replies as $reply){ if($reply->reply_id == intval($reply_id)){ $x = $x .','.$reply->reply_suggested; break; }}

		$myArr = explode(',', $x);
		$idx = count($myArr);

		if($myArr[$idx - 1]=='2' && count($myArr)>1){ foreach($replies as $reply){ if($reply->reply_id == intval(2)){ $x = $x .','.$reply->reply_suggested; break; }}}

		$this->session->set_userdata('chatbot_replies', $x);
	}

	public function drop_us_mail(){

	}


}

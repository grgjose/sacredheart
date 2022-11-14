<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

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
			$notif_count = 0;

			if($this->session->userdata('logged_in') != null){
				$complaints = $this->complaints_model->complaint_retrieve();
				$assistance = $this->assistance_model->assistance_retrieve();
				$requests = $this->requests_model->request_retrieve();

				foreach($complaints as $complaint){ if($complaint->seen == 1 && $this->session->userdata('user_id') == $complaint->user_id){ $count = $count + 1; }}
				foreach($assistance as $assist){ if($assist->seen == 1 && $this->session->userdata('user_id') == $assist->user_id){ $count = $count + 1; }}
				foreach($requests as $request){ if($request->seen == 1 && $this->session->userdata('user_id') == $request->user_id){ $count = $count + 1; }}
			}

			$data['notif_count;'] = $notif_count;

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
			$this->load->view('home', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}


	public function ayuda(){

		if($this->session->userdata('logged_in') == false)
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

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['info'] = $this->get_info();

			$data['receivers'] = $this->receivers_model->receiver_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('events/ayuda', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}

	}

	public function senior_citizen(){

		if($this->session->logged_in == false)
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

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['info'] = $this->get_info();

			$data['seniors'] = $this->seniors_model->senior_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('events/senior', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function projects(){

		if($this->session->logged_in == false)
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

			$data['user'] = $newdata;
			$data['error'] = $this->session->userdata('error');
			$data['success'] = $this->session->userdata('success');

			$data['info'] = $this->get_info();

			$data['projects'] = $this->projects_model->project_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('events/program', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
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

}

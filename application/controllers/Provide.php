<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provide extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

	// Defeault Function (Shows Admin Page)
	public function index()
	{
		if($this->session->userdata('usertype') != 2)
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


	public function verification(){

		if($this->session->userdata('usertype') != 2)
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

			$data['info'] = $this->get_info();

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('provide/verify', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}

	}

	public function complaints(){

		if($this->session->userdata('usertype') != 2)
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

			$data['info'] = $this->get_info();

			$data['complaints'] = $this->complaints_model->complaint_retrieve();
			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('provide/complaint', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function assistance(){

		if($this->session->userdata('usertype') != 2)
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

			$data['info'] = $this->get_info();

			$data['assistance'] = $this->assistance_model->assistance_retrieve();
			$data['assistance_types'] = $this->assistance_model->assistance_types_retrieve();

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('provide/assistance', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function requests(){

		if($this->session->userdata('usertype') != 2)
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

			$data['info'] = $this->get_info();

			$data['requests'] = $this->requests_model->request_retrieve();
			$data['request_types'] = $this->requests_model->request_types_retrieve();

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('provide/request', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function edit_barangay_info(){
		if($this->session->userdata('usertype') != 2)
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

			$data['info'] = $this->get_info();

			$data['users'] = $this->user_model->users_retrieve();

			$this->load->view('plus/header', $data);
			$this->load->view('provide/edit_info', $data);
			$this->load->view('plus/footer', $data);

			$this->session->unset_userdata('error');
			$this->session->unset_userdata('success');
		}
	}

	public function update_barangay_info(){

		$info = $this->get_info();

		$mission = $this->input->post('mission');
		$vision = $this->input->post('vision');
		$number1 = $this->input->post('number1');
		$number2 = $this->input->post('number2');
		$location = $this->input->post('location');
		$gmap = $this->input->post('gmap');
		$home_greetings = $this->input->post('home_greetings');
		$home_tagline = $this->input->post('home_tagline');
		$youtube_link = $this->input->post('youtube_link');

		$data = array(
			'info_logo' => $info['logo'],
			'info_adv_logo' => $info['adv_logo'],
			'info_mission' => $mission,
			'info_vision' => $vision,
			'info_number1' => $number1,
			'info_number2' => $number2,
			'info_location' => $location,
			'info_gmap' => $gmap,
			'info_home_userfile' => $info['home_userfile'],
			'info_home_greetings' => $home_greetings,
			'info_home_tagline' => $home_tagline,
			'info_youtube_link' => $youtube_link,
			'info_about_userfile1' => $info['about_userfile1'],
			'info_about_userfile2' => $info['about_userfile2'],
			'info_about_userfile3' => $info['about_userfile3'],
		);

		$this->info_model->info_update($data);

		$success = "Barangay Info Updated";
		$this->session->set_userdata('success' , $success);

		redirect('provide/edit_barangay_info','refresh');
	}

	public function update_barangay_info_img(){

		$info = $this->get_info();

		$id = $this->input->post('id');

		// Upload ID to a Path
		$config['upload_path']          = './assets/files/info/';
		$config['allowed_types']        = 'pdf|gif|jpg|png';
		$config['max_size']             = 100000;
		$config['file_name']			= time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('userfile'))
		{
			if($id == "logo"){ $info['logo'] = $this->upload->data('file_name'); }
			if($id == "adv_logo"){ $info['adv_logo'] = $this->upload->data('file_name'); }
			if($id == "home_userfile"){ $info['home_userfile'] = $this->upload->data('file_name'); }
			if($id == "about_userfile1"){ $info['about_userfile1'] = $this->upload->data('file_name'); }
			if($id == "about_userfile2"){ $info['about_userfile2'] = $this->upload->data('file_name'); }
			if($id == "about_userfile3"){ $info['about_userfile3'] = $this->upload->data('file_name'); }

		}

		$data = array(
			'info_logo' => $info['logo'],
			'info_adv_logo' => $info['adv_logo'],
			'info_mission' => $info['mission'],
			'info_vision' => $info['vision'],
			'info_number1' => $info['number1'],
			'info_number2' => $info['number2'],
			'info_location' => $info['location'],
			'info_gmap' => $info['gmap'],
			'info_home_userfile' => $info['home_userfile'],
			'info_home_greetings' => $info['home_greetings'],
			'info_home_tagline' => $info['home_tagline'],
			'info_youtube_link' => $info['youtube_link'],
			'info_about_userfile1' => $info['about_userfile1'],
			'info_about_userfile2' => $info['about_userfile2'],
			'info_about_userfile3' => $info['about_userfile3'],
		);

		$this->info_model->info_update($data);

		$success = "Barangay Info Updated";
		$this->session->set_userdata('success' , $success);

		redirect('provide/edit_barangay_info','refresh');
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

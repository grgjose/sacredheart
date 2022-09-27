<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'third_party/PHPMailer.php';
require APPPATH.'third_party/SMTP.php';
require APPPATH.'third_party/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
	public function __construct()
	{
		log_message('Debug', 'PHPMailer Class is loaded');
	}

	public function load()
	{
		$mail = new PHPMailer;
		return $mail;
	}
}
?>

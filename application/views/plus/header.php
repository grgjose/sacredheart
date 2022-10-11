<!DOCTYPE html>
<html lang="en">

<head>
	
	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>Sacred Heart Barangay | Information System</title>
	
	<!-- Mobile Specific Metas -->
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="Template" name="description">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=5.0" name="viewport">
	<meta content="Web Developer" name="author">
	<meta content="Template v1.0" name="generator">
	
	<!-- Favicon -->
	<link href="<?php echo base_url(); ?>assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	
	<!-- CSS Plugins (Bootstrap / Themify / Slick / Fancybox / AOS / Notyf) -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
	integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="<?php echo base_url(); ?>assets/plugins/themify-icons/themify-icons.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/aos/aos.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css" rel="stylesheet">
	
	<!-- CSS Custom -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

	<!-- Headbar Navigation -->
	<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
		<div class="container">

			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img alt="logo" src="<?php echo base_url(); ?>assets/images/logo.png"></a> 
			<button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" 
			data-target="#navbarNav" data-toggle="collapse" type="button"><span class="ti-menu"></span></button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active @@home">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					
					<!-- Headbar Navigation (For Officials) -->
					<?php if($user['usertype'] == 2 ){?>
					<li class="nav-item dropdown @@Provide">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Provide Service <span><i class="ti-angle-down"></i></span></a> 
						<!-- Dropdown list -->
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item @@team" href="<?php echo base_url(); ?>provide/verification">Verify Resident</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>provide/complaints">View Complaints</a>
							</li>
							<li>
								<a class="dropdown-item @@blog" href="<?php echo base_url(); ?>provide/information">Edit Barangay Info</a>
							</li>
						</ul>
					</li>
					<?php } ?>

					<!-- Headbar Navigation (For Normal Users) -->
					<li class="nav-item dropdown @@services">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Services <span><i class="ti-angle-down"></i></span></a> 
						<!-- Dropdown list -->
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item @@team" href="<?php echo base_url(); ?>services/request_document">Request Document</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>services/file_complaint">File Complaint</a>
							</li>
							<li>
								<a class="dropdown-item @@blog" href="<?php echo base_url(); ?>services/assistance">Assistance</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown @@events">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Events <span><i class="ti-angle-down"></i></span></a> 
						<!-- Dropdown list -->
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item @@team" href="<?php echo base_url(); ?>events/ayuda">Ayuda Program</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>events/senior_citizen">Senior Citizen Program</a>
							</li>
							<li>
								<a class="dropdown-item @@blog" href="<?php echo base_url(); ?>events/projects">Projects / Upcoming Projects</a>
							</li>
						</ul>
					</li>

					<li class="nav-item @@about">
						<a class="nav-link" href="<?php echo base_url(); ?>home/about">About</a>
					</li>
					<li class="nav-item @@contact">
						<a class="nav-link" href="<?php echo base_url(); ?>home/contact">Contact</a>
					</li>
					
					<!-- Headbar Navigation (For Logged Out Users) -->
					<?php if($user['logged_in'] == false ){?>
					<li class="nav-item @@login">
						<a class="nav-link" data-target="#LoginModal" data-toggle="modal" href="#">Login</a>
					</li>
					<li class="nav-item @@register">
						<a class="nav-link" href="<?php echo base_url(); ?>home/register">Register</a>
					</li>

					<!-- Headbar Navigation (For Logged In Users) -->
					<?php } else { ?>
					<li class="nav-item dropdown @@myprofile">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Welcome Resident <span><i class="ti-angle-down"></i></span></a> 
						<!-- Dropdown list -->
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item @@team" href="<?php echo base_url(); ?>">My Home</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>home/edit_info">Edit Info</a>
							</li>
							<li>
								<a class="dropdown-item @@blog" href="<?php echo base_url(); ?>home/logout">Logout</a>
							</li>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Login Window -->
	<div aria-hidden="true" aria-labelledby="LoginModal" class="modal fade" id="LoginModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body" style="padding-top:0px;">
					<div class="form-title text-center" style="padding-bottom: 20px">
						<h4>Login</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<?php echo form_open('home/login'); ?>
						<div class="form-group">
							<input class="form-control" id="email" name="email" placeholder="Enter your email address..." type="email">
						</div>
						<div class="form-group">
							<input class="form-control" id="password" name="password" placeholder="Enter your password..." type="password">
						</div>
						<button class="btn btn-info btn-block btn-round" type="submit">Login</button> 
						<?php echo form_close(); ?> <br>
						<div class="text-center text-muted delimiter">
							<a href="<?php echo base_url(); ?>home/reset">Forgot Password?</a>
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<div class="signup-section">
						Not a member yet? <a class="text-info" href="<?php echo base_url(); ?>home/register">Register</a>.
					</div>
				</div>
			</div>
		</div>
	</div>

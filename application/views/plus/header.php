<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacred Heart Barangay | Information System</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Web Developer">
  <meta name="generator" content="Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/aos/aos.css">

  <!-- Notyf Plugin -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

  <!-- CUSTOM CSS -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active @@home">
          <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
        </li>

		<?php if($user['usertype'] == 2 ){?>
		<li class="nav-item dropdown @@Provide">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Provide Service
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @@team" href="team.html">Verify Resident</a></li>
            <li><a class="dropdown-item @@career" href="career.html">View Complaints</a></li>
            <li><a class="dropdown-item @@blog" href="blog.html">Edit Barangay Info</a></li>

          </ul>
        </li>
		<?php } ?>
        <li class="nav-item dropdown @@services">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Services
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @@team" href="team.html">Request Document</a></li>
            <li><a class="dropdown-item @@career" href="career.html">File Complaint</a></li>
            <li><a class="dropdown-item @@blog" href="blog.html">Assistance</a></li>

          </ul>
        </li>
		<li class="nav-item dropdown @@events">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Events
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @@team" href="team.html">Ayuda Program</a></li>
            <li><a class="dropdown-item @@career" href="career.html">Senior Citizen Program</a></li>
            <li><a class="dropdown-item @@blog" href="blog.html">Projects / Upcoming Projects</a></li>

          </ul>
        </li>

        <li class="nav-item @@about">
          <a class="nav-link" href="<?php echo base_url(); ?>home/about">About</a>
        </li>
        <li class="nav-item @@contact">
          <a class="nav-link" href="<?php echo base_url(); ?>home/contact">Contact</a>
        </li>
		
		<?php if($user['logged_in'] == false ){?>
		<li class="nav-item @@login">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Login</a>
        </li>
		<li class="nav-item @@register">
          <a class="nav-link" href="<?php echo base_url() ?>home/register">Register</a>
        </li>
		<?php } else { ?>

		<li class="nav-item dropdown @@myprofile">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Welcome Resident
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @@team" href="team.html">My Home</a></li>
            <li><a class="dropdown-item @@career" href="career.html">Edit Info</a></li>
            <li><a class="dropdown-item @@blog" href="<?php echo base_url(); ?>home/logout">Logout</a></li>
          </ul>
        </li>
		<?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top:0px;">
        <div class="form-title text-center" style="padding-bottom: 20px">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <?php echo form_open('home/login'); ?>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password...">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
           <?php echo form_close(); ?>
          <br>
          <div class="text-center text-muted delimiter"><a href="<?php echo base_url(); ?>home/reset">Forgot Password?</a></div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Register</a>.</div>
      </div>
	</div>
  </div>
</div>

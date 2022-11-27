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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
	integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link href="<?php echo base_url(); ?>assets/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/themify-icons/themify-icons.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/aos/aos.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	
	<!-- CSS Custom -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	
</head>
<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

	<!-- Headbar Navigation -->
	<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
		<div class="container">

			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img alt="logo" src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['logo']; ?>"></a> 
			<button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" 
			data-target="#navbarNav" data-toggle="collapse" type="button"><span class="ti-menu"></span></button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li id="navbar-home" class="nav-item @@home">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					
					<!-- Headbar Navigation (For Officials) -->
					<?php if($user['usertype'] == 2 ){?>
					<li id="navbar-provide" class="nav-item dropdown @@Provide">
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
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>provide/assistance">View Assistance Requests</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>provide/requests">View Document Requests</a>
							</li>
							<li>
								<a class="dropdown-item @@career" href="<?php echo base_url(); ?>provide/edit_barangay_info">Edit Barangay Info</a>
							</li>
						</ul>
					</li>
					<?php } elseif($user['usertype'] == 3) { ?>
					<!-- Headbar Navigation (For Normal Users) -->
					<li id="navbar-services" class="nav-item dropdown @@services">
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
					<?php } ?>

					<?php if($user['usertype'] == 2 || $user['usertype'] == 3){?>
					<li id="navbar-events" class="nav-item dropdown @@events">
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
					<?php } ?>

					<li id="navbar-about" class="nav-item @@about">
						<a class="nav-link" href="<?php echo base_url(); ?>home/about">About</a>
					</li>
					<li id="navbar-contact" class="nav-item @@contact">
						<a class="nav-link" href="<?php echo base_url(); ?>home/contact">Contact</a>
					</li>
					
					<!-- Headbar Navigation (For Logged Out Users) -->
					<?php if($user['logged_in'] == false ){?>
					<li id="navbar-login" class="nav-item @@login">
						<a class="nav-link" data-target="#LoginModal" data-toggle="modal" href="#">Login</a>
					</li>
					<li id="navbar-register" class="nav-item @@register">
						<a class="nav-link" href="<?php echo base_url(); ?>home/register">Register</a>
					</li>

					<!-- Headbar Navigation (For Logged In Users) -->
					<?php } else { ?>
					<li id="navbar-myprofile" class="nav-item dropdown @@myprofile">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $user['lname']; ?> 
							<span><i class="ti-angle-down"></i>
							<?php if($user['notif_count'] != 0){ ?>
							<i class="ti-bell" style="width: 14px; height: 14px; border-radius: 5px; background-color: #C7E4EE; font-size: 14px; padding: 5px; ">
								<?php echo $user['notif_count']; ?>
							</i>
							</span>
							<?php } ?>
						</a> 
						<!-- Dropdown list -->
						<ul class="dropdown-menu">
							<?php if($user['usertype'] == 3){ ?>
							<li>
								<a class="dropdown-item @@team" href="<?php echo base_url(); ?>home/my_info">My Home
									<span><i class="ti-angle-down"></i>
									<?php if($user['notif_count'] != 0){ ?>
									<i class="ti-bell" style="width: 14px; height: 14px; border-radius: 5px; background-color: #C7E4EE; font-size: 14px; padding: 5px; ">
										<?php echo $user['notif_count']; ?>
									</i>
									</span>
									<?php } ?>
								</a>
							</li>
							<?php } ?>
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

	<script>
		$(document).ready(function(){
			var url = window.location.href;

			if(url.indexOf('provide') > 0){
				$('#navbar-provide').addClass("active");
			}

			else if(url.indexOf('services') > 0){
				$('#navbar-services').addClass("active");
			}

			else if(url.indexOf('events') > 0){
				$('#navbar-events').addClass("active");
			}

			else if(url.indexOf('about') > 0){
				$('#navbar-about').addClass("active");
			}

			else if(url.indexOf('contact') > 0){
				$('#navbar-contact').addClass("active");
			}

			else if(url.indexOf('login') > 0){
				$('#navbar-login').addClass("active");
			}

			else if(url.indexOf('register') > 0){
				$('#navbar-register').addClass("active");
			}

			else if(url.indexOf('myprofile') > 0){
				$('#navbar-myprofile').addClass("active");
			} 
			else {
				$('#navbar-home').addClass("active");
			}
		});
	</script>

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

	<!-- Terms and Conditions Modal -->
	<div aria-hidden="true" aria-labelledby="TermsModal" class="modal fade" id="TermsModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body" style="padding-top:0px;">
					<div class="d-flex flex-column text-center">
						<h1>Terms and Conditions for Sacred Heart Barangay</h1>

						<h2>Introduction</h2> 
  
						<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Sacred Heart accessible at http://localhost/sacredheart/.</p>

						<p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions. These Terms and Conditions have been generated with the help of the <a href="https://www.termsandcondiitionssample.com">Terms And Conditiions Sample Generator</a>.</p>

						<p>Minors or people below 18 years old are not allowed to use this Website.</p>

						<h2>Intellectual Property Rights</h2>

						<p>Other than the content you own, under these Terms, Sacred Heart Barangay and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>

						<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>

						<h2>Restrictions</h2>

						<p>You are specifically restricted from all of the following:</p>

						<ul>
							<li>publishing any Website material in any other media;</li>
							<li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
							<li>publicly performing and/or showing any Website material;</li>
							<li>using this Website in any way that is or may be damaging to this Website;</li>
							<li>using this Website in any way that impacts user access to this Website;</li>
							<li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
							<li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
							<li>using this Website to engage in any advertising or marketing.</li>
						</ul>

						<p>Certain areas of this Website are restricted from being access by you and Sacred Heart Barangay may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

						<h2>Your Content</h2>

						<p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Sacred Heart Barangay a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>

						<p>Your Content must be your own and must not be invading any third-party’s rights. Sacred Heart Barangay reserves the right to remove any of Your Content from this Website at any time without notice.</p>

						<h2>Your Privacy</h2>

						<p>Please read Privacy Policy.</p>

						<h2>No warranties</h2>

						<p>This Website is provided "as is," with all faults, and Sacred Heart Barangay express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>

						<h2>Limitation of liability</h2>

						<p>In no event shall Sacred Heart Barangay, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Sacred Heart Barangay, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

						<h2>Indemnification</h2>

						<p>You hereby indemnify to the fullest extent Sacred Heart Barangay from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

						<h2>Severability</h2>

						<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

						<h2>Variation of Terms</h2>

						<p>Sacred Heart Barangay is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

						<h2>Assignment</h2>

						<p>The Sacred Heart Barangay is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>

						<h2>Entire Agreement</h2>
    
						<p>These Terms constitute the entire agreement between Sacred Heart Barangay and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

						<h2>Governing Law & Jurisdiction</h2>

						<p>These Terms will be governed by and interpreted in accordance with the laws of the State of ph, and you submit to the non-exclusive jurisdiction of the state and federal courts located in ph for the resolution of any disputes.</p>
					</div>
				</div>
			</div>
		</div>
	</div>


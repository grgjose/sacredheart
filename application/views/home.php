

<!-- 

********************************
*         INTRO BANNER         *
******************************** 

-->

<section class="section gradient-banner">

	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4"><?php echo $info['home_greetings']; ?></h1>
				<p class="text-white mb-5"><?php echo $info['home_tagline']; ?></p>
				<a href="<?php base_url(); ?>home/register" class="btn btn-main-md">Request Registration For Residents</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['home_userfile']; ?>" alt="screenshot">
			</div>
		</div>
	</div>

</section>

<section class="section pt-0 position-relative pull-top">
	<div class="container">
		<div class="rounded shadow p-5 bg-white">
			<div class="row">
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-bolt-alt text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">services made easy</h3>
					<p class="regular text-muted">Your concerns matter to us, So please click the File Complaint under Services Tab for more info.</p>
				</div>
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-comments-smiley text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">chatbot helper</h3>
					<p class="regular text-muted">We want to provide a better experience, To summon a reliable helper, just click the Chatbot Icon or Click this link.</p>
				</div>
				<div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
					<i class="ti-blackboard text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">events dashboard</h3>
					<p class="regular text-muted">Our events and upcoming events are posted in this site so you won't miss anything.</p>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- 

********************************
*            FEATURE           *
******************************** 

-->


<?php $ctr = 0; foreach($projects as $project){ ?>

<section class="feature section pt-0">
	<div class="container">
		<div class="row">

			<?php if( $ctr == 0 ){ ?>

			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content">
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/<?php echo $project->project_userfile; ?>" alt="iphone">
				</div>
			</div>

			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>One of Our Events: <?php echo $project->project_title; ?></h2>
					<!-- Feature Description -->
					<p class="desc"><?php echo $project->project_details; ?></p>
				</div>
				<!-- Testimonial Quote -->
				<div class="testimonial">
					<ul class="list-inline meta">
						<?php foreach($users as $user){ ?>
						<?php if($user->user_id == $project->user_id){ ?>
						<li class="list-inline-item">
							<img src="<?php echo base_url(); ?>assets/files/users/<?php echo $user->userfile; ?>" alt="">
						</li>
						<li class="list-inline-item"><?php echo $user->fname.' '.$user->mname.' '.$user->lname; ?> , <?php echo $user->position; ?></li>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>

			<?php } elseif( $ctr == 1 ){ ?>

			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>One of Our Events: <?php echo $project->project_title; ?></h2>
					<!-- Feature Description -->
					<p class="desc"><?php echo $project->project_details; ?></p>
				</div>
				<!-- Testimonial Quote -->
				<div class="testimonial">
					<ul class="list-inline meta">
						<?php foreach($users as $user){ ?>
						<?php if($user->user_id == $project->user_id){ ?>
						<li class="list-inline-item">
							<img src="<?php echo base_url(); ?>assets/files/users/<?php echo $user->userfile; ?>" alt="">
						</li>
						<li class="list-inline-item"><?php echo $user->fname.' '.$user->mname.' '.$user->lname; ?> , <?php echo $user->position; ?></li>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content">
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/<?php echo $project->project_userfile; ?>" alt="iphone">
				</div>
			</div>

			<?php } ?>

		</div>
	</div>
</section>

<?php $ctr = $ctr + 1; } ?>

<!--

********************************
*      PROMOTIONAL VIDEO       *
******************************** 



<section class="video-promo section bg-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content-block">

					<h2>Watch this Video</h2>
					<p>Let us show you how we do things here in our Barangay!</p>
					<a data-fancybox href="<?php echo $info['youtube_link']; ?>">
						<i class="ti-control-play video"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

-->
<!-- 

********************************
*      INSPIRATIONAL QUOTES    *
******************************** 

-->

<section class="section testimonial" id="testimonial" style="background-color:#F5F5F5;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Testimonial Slider -->
				<div class="testimonial-slider owl-carousel owl-theme">
					<div class="item">
						<div class="block">
							<!-- Speech -->
							<img src="<?php echo base_url() ?>assets/files/info/<?php echo $info['adv_logo']; ?>" width="450px" height="200px">
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<h4>Mission</h4>
							<p>
								<?php echo $info['mission']; ?>
							</p>
							<!-- Person Thumb 
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/files/users/pat.jpg" alt="image">
							</div> -->
							<!-- Name and Company
							<cite>Patricia Del Rosario , SK Secretary</cite>  -->
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<h4>Vision</h4>
							<p>
								<?php echo $info['vision']; ?>
							</p>
							<!-- Person Thumb 
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/files/users/pat.jpg" alt="image">
							</div> -->
							<!-- Name and Company
							<cite>Patricia Del Rosario , SK Secretary</cite>  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


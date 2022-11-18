
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Upcoming Projects</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *         CREATE SERVICE       *
	 ******************************** -->
<section class="feature section pt-0">
	<div class="container">

		<table id="myTable2" class="table table-hover table-borderless results" style="font-size: 13px;" width="100%">

		 <thead>
			<tr>
				<th>&nbsp;</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($projects as $project){ ?>
			<?php if((strtotime($project->project_date) >= Time()) && ($project->archive == 0)){ ?>
			<tr>
				<td style="height: 30px;" class="text-center">
					<div class="row">
					<div class="col-lg-6 ml-auto justify-content-center">
							<!-- Feature Mockup -->
							<div class="image-content">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/<?php echo $project->project_userfile; ?>" alt="iphone">
							</div>
						</div>
						<div class="col-lg-6 mr-auto align-self-center">
							<div class="feature-content">
								<!-- Feature Title -->
								<h2>Upcoming Project: <?php echo $project->project_title; ?></h2>
								<!-- Feature Description -->
								<p class="desc"><?php echo $project->project_details; ?></p>
							</div>
							<!-- Testimonial Quote -->
							<div class="testimonial">
								<ul class="list-inline meta">
									<?php foreach($users as $user){ ?>
									<?php if($user->user_id == $project->user_id){ ?>
									<li class="list-inline-item">
										<img src="<?php echo base_url(); ?>assets/files/users/<?php echo $user->userfile;?>" alt="">
									</li>
									<li class="list-inline-item"><?php echo $user->fname.' '.$user->mname.' '.$user->lname; break;?> , <?php echo $user->position; break;?></li>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>
			</tbody>
		</table>

	</div>
</section>


<script>
	$(document).ready(function () {
		$('#myTable2').DataTable({
		"paging": true,
		"lengthChange": false,
		"lengthMenu": [3],
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"responsive": true,
		});
		$('#myTable2_wrapper input').attr('class', 'form-control main');
		$('#myTable2_wrapper input').attr('style', 'height: 30px;');
		$('#myTable2_wrapper select').attr('class', 'form-control main');
		$('#myTable2_wrapper select').attr('style', 'height: 30px;');
	});
</script>

<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Finished Projects</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *         CREATE SERVICE       *
	 ******************************** -->
<section class="feature section pt-0">
	<div class="container">

		<table id="myTable" class="table table-hover table-borderless results" style="font-size: 13px;" width="100%">

		 <thead>
			<tr>
				<th>&nbsp;</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($projects as $project){ ?>
			<?php if((strtotime($project->project_date) < Time()) && ($project->archive == 0)){ ?>
			<tr>
				<td style="height: 30px;" class="text-center">
					<div class="row">
					<div class="col-lg-6 ml-auto justify-content-center">
							<!-- Feature Mockup -->
							<div class="image-content">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/<?php echo $project->project_userfile; ?>" alt="iphone">
							</div>
						</div>
						<div class="col-lg-6 mr-auto align-self-center">
							<div class="feature-content">
								<!-- Feature Title -->
								<h2>Finished Projects: <?php echo $project->project_title; ?></h2>
								<!-- Feature Description -->
								<p class="desc"><?php echo $project->project_details; ?></p>
							</div>
							<!-- Testimonial Quote -->
							<div class="testimonial">
								<ul class="list-inline meta">
									<?php foreach($users as $user){ ?>
									<?php if($user->user_id == $project->user_id){ ?>
									<li class="list-inline-item">
										<img src="<?php echo base_url(); ?>assets/files/users/<?php echo $user->userfile;?>" alt="">
									</li>
									<li class="list-inline-item"><?php echo $user->fname.' '.$user->mname.' '.$user->lname; break;?> , <?php echo $user->position; break;?></li>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>
			</tbody>
		</table>

	</div>
</section>

<script>
	$(document).ready(function () {
		$('#myTable').DataTable({
			"paging": true,
			"lengthChange": false,
			"lengthMenu": [3],
			"searching": true,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
		});
		$('#myTable_wrapper input').attr('class', 'form-control main');
		$('#myTable_wrapper input').attr('style', 'height: 30px;');
		$('#myTable_wrapper select').attr('class', 'form-control main');
		$('#myTable_wrapper select').attr('style', 'height: 30px;');
	});
</script>

<!-- ********************************
     *         QUOTES KEME          *
	 ******************************** -->
<section class="section quotes pt-0">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<div class="quote-slider">
					<div class="item mb-4">
						<!-- Quote -->
						<h2>What you see is what you get, nothing more, nothing less.</h2>
						<!-- Company -->
						<cite class="ml-0">-Kendrick Lamar</cite>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ********************************
     *			PARTNERSHIP         *
	 ******************************** 
<section class="section clients bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<h3>Our Barangay was featured In</h3>
				<div class="client-slider">
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/business-finder.png" alt="business-finder">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/forbes.png" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/venture-beat.png" alt="venture-beat">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/tech-crunch-new.png" alt="TechCrunch">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/forbes.png" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/venture-beat.png" alt="venture-beat">
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->


<!-- ********************************
     *			OFFICIALS           *
	 ******************************** -->
<section class="section investors">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Our Barangay Officials</h2>
					<p>If cartoon bluebirds were real, a couple of 'em would be sitting on your shoulders singing right now.</p>
				</div>
			</div>

			<?php foreach($users as $user){ if($user->usertype == 2 && $user->dp_userfile != ""){ ?>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/officials/<?php echo $user->dp_userfile; ?>" alt="investor">
					</div>
					<!-- Company -->
					<h3><?php echo $user->fname.' '.$user->mname.' '.$user->lname; ?></h3>
					<!--  -->
					<p><?php echo $user->position; ?></p>
				</div>
			</div>
			<?php }} ?>
			
		</div>
	</div>
</section>

<!-- ********************************
     *			RESIDENTS           *
	 ********************************
<section class="section cta-hire bg-gary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">

				<h2>We are hunting Passionate Residents</h2>

				<p>Be curious. Use data. Leverage imagination. Be an expert. Be an enthusiast. Be authentic. Know your competition. 
				Hiring is the most important people function you have, and most of us aren’t as good at it as we think.
				Refocusing your resources on hiring better will have a higher return than almost any training program you can develop. </p>

				<a href="<?php echo base_url(); ?>home/register" class="mt-3 btn btn-main-md">Register as a Resident</a>
			</div>
		</div>
	</div>
</section>  -->

<!--====  End of Section comment  ====-->

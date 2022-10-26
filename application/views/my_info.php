
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Filed Complaints</h1>
				<br> <br> 

				<table id="myTable" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="col-md-5 col-xs-5 text-center">Date Requested</th>
					  <th class="col-md-1 col-xs-2 text-center">Complaint Description</th>
					  <th class="col-md-2 col-xs-2 text-center">Complaint Letter</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($complaints as $complaint) { ?>
					<tr>
						<td style="height: 30px;" class="text-center"><?php echo $complaint->date_created; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $complaint->complaint_description; ?></td>
						<td style="height: 30px;" class="text-center"><a href="<?php echo base_url() . $complaint->complaint_letter; ?>"><?php echo $complaint->complaint_letter; ?></a></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>

				<script>
					$(document).ready(function () {
						$('#myTable').DataTable({
							lengthMenu: [5, 10, 20, 50]
						});
						$('#myTable_wrapper input').attr('class', 'form-control main');
						$('#myTable_wrapper input').attr('style', 'height: 30px;');
						$('#myTable_wrapper select').attr('class', 'form-control main');
						$('#myTable_wrapper select').attr('style', 'height: 30px;');
					});
				</script>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Document Requested</h1>
				<br> <br> 

				<table id="myTable1" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="col-md-5 col-xs-5 text-center">Date Requested</th>
					  <th class="col-md-1 col-xs-2 text-center">Document Type</th>
					  <th class="col-md-2 col-xs-2 text-center">Document Purpose</th>
					  <th class="col-md-2 col-xs-2 text-center">Date Needed</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($requests as $request) { ?>
					<tr>
						<td style="height: 30px;" class="text-center"><?php echo $request->date_created; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $request->document_type; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $request->document_purpose; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $request->date_needed; ?></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>

				<script>
					$(document).ready(function () {
						$('#myTable1').DataTable({
							lengthMenu: [5, 10, 20, 50]
						});
						$('#myTable1_wrapper input').attr('class', 'form-control main');
						$('#myTable1_wrapper input').attr('style', 'height: 30px;');
						$('#myTable1_wrapper select').attr('class', 'form-control main');
						$('#myTable1_wrapper select').attr('style', 'height: 30px;');
					});
				</script>
			</div>
		</div>
	</div>
</section>


<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Filed Assistance Requests</h1>
				<br> <br> 

				<table id="myTable2" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="col-md-5 col-xs-5 text-center">Date Requested</th>
					  <th class="col-md-1 col-xs-2 text-center">Assistance Type</th>
					  <th class="col-md-2 col-xs-2 text-center">Assistance Purpose</th>
					  <th class="col-md-2 col-xs-2 text-center">Date Needed</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($assistance as $assist) { ?>
					<tr>
						<td style="height: 30px;" class="text-center"><?php echo $assist->date_created; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $assist->assistance_type; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $assist->assistance_purpose; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $assist->date_needed; ?></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>

				<script>
					$(document).ready(function () {
						$('#myTable2').DataTable({
							lengthMenu: [5, 10, 20, 50]
						});
						$('#myTable2_wrapper input').attr('class', 'form-control main');
						$('#myTable2_wrapper input').attr('style', 'height: 30px;');
						$('#myTable2_wrapper select').attr('class', 'form-control main');
						$('#myTable2_wrapper select').attr('style', 'height: 30px;');
					});
				</script>
			</div>
		</div>
	</div>
</section>






<!-- ********************************
     *             STORY            *
	 ******************************** -->
<section class="section about p-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 align-self-center">
				<div class="content text-center text-lg-left">
					<!-- Headline -->
					<h2>This is our story.</h2>
					<!-- Story -->
					<p>Men go abroad to wonder at the heights of mountains, 
					at the huge waves of the sea, at the long courses of the rivers, 
					at the vast compass of the ocean, at the circular motions of the stars, 
					and they pass by themselves without wondering.</p>
				</div>
			</div>
			<div id="carouselOfficial" class="col-lg-6 mt-4 carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselOfficial" data-slide-to="0" class="active"></li>
					<li data-target="#carouselOfficial" data-slide-to="1"></li>
					<li data-target="#carouselOfficial" data-slide-to="2"></li>
				</ol>
				<!-- Story Image Slider -->
				<div class="about-slider carousel-inner">
					<!-- Story Image -->
					<div class="item carousel-item active">
						<img class="w-100" style="height: 320px;" src="<?php echo base_url(); ?>assets/images/officials/official_01.jpg" alt="slider-image">
					</div>
					<!-- Story Image -->
					<div class="item carousel-item">
						<img class="w-100" style="height: 320px;" src="<?php echo base_url(); ?>assets/images/officials/official_02.jpg" alt="slider-image">
					</div>
					<!-- Story Image -->
					<div class="item carousel-item">
						<img class="w-80" style="height: 320px;" src="<?php echo base_url(); ?>assets/images/officials/official_03.jpg" alt="slider-image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *         WHY SERVE            *
	 ******************************** -->
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title mb-0">
					<h2>Why we serve Barangay Sacred Heart</h2>
					<p>Some may serve for hope of earthly reward. 
					Such a man or woman might serve in Church positions or in private acts of mercy in an 
					effort to achieve prominence or cultivate contacts that would increase income or aid in acquiring
					wealth. Others might serve in order to obtain worldly honors, prominence, or power.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *         CREATE SERVICE       *
	 ******************************** -->
<section class="section create-stories pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/events/event_04.jpg" alt="Story-Image">
					<!-- Heading -->
					<h2>Our Story</h2>
					<!-- Story -->
					<p>Men go abroad to wonder at the heights of mountains, 
					at the huge waves of the sea, at the long courses of the rivers, 
					at the vast compass of the ocean, at the circular motions of the stars, 
					and they pass by themselves without wondering.</p>
				</div>
			</div>
			<div class="col-lg-6 mt-5 mt-lg-0">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/events/event_06.jpg" alt="Story-Image">
					<!-- Heading -->
					<h2>What we do</h2>
					<!-- Story -->
					<p>Some may serve for hope of earthly reward. 
					Such a man or woman might serve in Church positions or in private acts of mercy in an 
					effort to achieve prominence or cultivate contacts that would increase income or aid in acquiring
					wealth. Others might serve in order to obtain worldly honors, prominence, or power.</p>
				</div>
			</div>
		</div>
	</div>
</section>


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
	 ******************************** -->
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
</section>


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
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_04.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_05.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_06.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_07.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_08.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_09.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_10.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_11.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *			RESIDENTS           *
	 ******************************** -->
<section class="section cta-hire bg-gary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<!-- Hire Title -->
				<h2>We are hunting Passionate Residents</h2>
				<!-- Job Description -->
				<p>Be curious. Use data. Leverage imagination. Be an expert. Be an enthusiast. Be authentic. Know your competition. 
				Hiring is the most important people function you have, and most of us aren’t as good at it as we think.
				Refocusing your resources on hiring better will have a higher return than almost any training program you can develop. </p>
				<!-- Action Button -->
				<a href="<?php echo base_url(); ?>home/register" class="mt-3 btn btn-main-md">Register as a Resident</a>
			</div>
		</div>
	</div>
</section>

<!--====  End of Section comment  ====-->

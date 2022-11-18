
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Senior Citizens</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>

				<br> <br> <br>

				<table id="myTable" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="col-md-5 col-xs-5 text-center">Name / Surname</th>
					  <th class="col-md-1 col-xs-2 text-center">Age</th>
					  <th class="col-md-2 col-xs-2 text-center">Job</th>


					</tr>
				  </thead>
				  <tbody>
					<?php foreach($seniors as $senior) { ?>
					<tr>
						<td style="height: 30px;" class="text-center"><?php echo $senior->fname . ' ' . $senior->mname . ' ' . $senior->lname; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $senior->age; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $senior->job; ?></td>


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
</section> -->
<!--====  End of Section comment  ====-->

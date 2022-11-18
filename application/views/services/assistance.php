

<!-- ********************************
     *             STORY            *
	 ******************************** -->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Assistance Details</h2>
			</div>
			<div class="col-12">
				<?php echo form_open('services/upload_assistance') ?>
					<div class="row">
						<!-- Name -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Assistance Type:</label>
							<select class="form-select form-control main" name="asst_type" aria-label="Select Assistance Type" required>
								<?php $ctr = 0; foreach($assistance_types as $type){ ?> 
									<option value="<?php echo $type->assistance_type_id; ?>" <?php if($ctr == 0){ echo "selected"; } ?>><?php echo $type->assistance_type; $ctr = $ctr + 1;?></option>
								<?php }?>
							</select>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Assistance Purpose:</label>
							<textarea class="form-control main" name="purpose" rows="10" placeholder="Enter your purpose here..."></textarea>
						</div>

						<!-- Message -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Date Needed:</label>
							<input class="form-control main" type="date" name="date_needed" min="<?php echo date("Y-m-d"); ?>" placeholder="Enter your purpose here..." />
						</div>
						


						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-main-md">Submit</button>
						</div>
					</div>
				</form>
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

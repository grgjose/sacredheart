

<!-- ********************************
     *             STORY            *
	 ******************************** -->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Enter Document Details</h2>
			</div>
			<div class="col-12">
				<?php echo form_open('services/upload_request'); ?>
					<div class="row">
						<!-- Name -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Document Type:</label>
							<select class="form-select form-control main" name="doctype" style="height: 50px;" aria-label="Select Document Type" required>
							  <option value="Cedula" selected>Cedula</option>
							  <option value="Barangay Clearance">Barangay Clearance</option>
							  <option value="Business Clearance">Business Clearance</option>
							  <option value="Barangay ID">Barangay ID</option>
							</select>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Document Purpose:</label>
							<textarea class="form-control main" name="purpose" rows="10" placeholder="Enter your purpose here..." required></textarea>
						</div>

						<!-- Message -->
						<div class="col-md-12 mb-2">
							<label class="form-label">Date Needed:</label>
							<input class="form-control main" type="date" name="docdate" required/>
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
			</div>
		</div>
	</div>
</section>

<!--====  End of Section comment  ====-->

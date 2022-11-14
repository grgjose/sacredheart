
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12 m-auto">
				<!-- Page Title -->
				<h1>Edit Barangay Info</h1>
				<!-- Page Description -->
				<p>You can Edit here the Barangay Information like Mission, Vision, Logo, Contact Numbers, Location, Etc.</p>

				<br> <br><br>

					<?php echo form_open_multipart('provide/update_barangay_info'); ?>
					<div class="form-row">
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['logo']; ?>" width="120px" height="120px" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('logo')">Click to change Barangay Logo</a>
						</div>
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['adv_logo']; ?>" width="200px" height="120px" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('adv_logo')">Click to change Advocacy Logo</a>
						</div>
					</div> <br>


					<div class="form-row">
						<div class="col">
							<label for="mission">Mission</label>
							<textarea class="form-control" name="mission" id="mission" style="resize:none;" rows="6" required><?php echo $info['mission']; ?></textarea>
						</div>
						<div class="col">
							<label for="vision">Vision</label>
							<textarea class="form-control" name="vision" id="vision" style="resize:none;" rows="6" required><?php echo $info['vision']; ?></textarea>
						</div>
					</div> <br>



					<div class="form-row">
						<div class="col">
							<label for="number1">Contact #1</label>
							<input type="text" class="form-control" id="number1" name="number1" placeholder="Contact Number (Option 1)" value="<?php echo $info['number1']; ?>" required>
						</div>
						<div class="col">
							<label for="number2">Contact #2</label>
							<input type="text" class="form-control" id="number2" name="number2" placeholder="Contact Number (Option 2)" value="<?php echo $info['number2']; ?>" required>
						</div>
					</div> <br>
					<div class="form-row">
						<div class="col">
							<label for="location">Location</label>
							<input type="text" class="form-control" id="location" name="location" placeholder="Location" value="<?php echo $info['location']; ?>" required>
						</div>
					</div> <br>


					<div class="form-row">
						<div class="col">
							<label for="gmap">Google Map iFrame Link</label>
							<textarea class="form-control" name="gmap" id="gmap" style="resize:none;" rows="4" required><?php echo $info['gmap']; ?></textarea>
						</div>
					</div> <br>

					<div class="form-row">
						<div class="col">
							<label for="home_greetings">Greetings</label>
							<textarea class="form-control" name="home_greetings" id="home_greetings" style="resize:none;" rows="1" required ><?php echo $info['home_greetings']; ?></textarea>
						</div>
						<div class="col">
							<label for="home_tagline">Tagline</label>
							<textarea class="form-control" name="home_tagline" id="home_tagline" style="resize:none;" rows="1" required><?php echo $info['home_tagline']; ?></textarea>
						</div>
					</div> <br>

					<div class="form-row">
						<div class="col">
							<label for="youtube_link">Youtube Link</label>
							<textarea class="form-control" name="youtube_link" id="youtube_link" style="resize:none;" rows="1" required ><?php echo $info['youtube_link']; ?></textarea>
						</div>
					</div> <br>

					<div class="form-row">
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['home_userfile']; ?>" width="340px" height="250px" style="border: 1px solid black; margin-bottom: 5px;" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('home_userfile')">Click to change Home Banner Image</a>
						</div>
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['about_userfile1']; ?>" width="340px" height="250px" style="border: 1px solid black; margin-bottom: 5px;" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('about_userfile1')">Click to change About Us First Slide</a>
						</div>
					</div> <br>

					<div class="form-row">
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['about_userfile2']; ?>" width="340px" height="250px" style="border: 1px solid black; margin-bottom: 5px;" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('about_userfile2')">Click to change About Us Second Slide</a>
						</div>
						<div class="col">
							<img src="<?php echo base_url(); ?>assets/files/info/<?php echo $info['about_userfile3']; ?>" width="340px" height="250px" style="border: 1px solid black; margin-bottom: 5px;" /> <br>
							<a href="#" data-toggle="modal" data-target="#ImageUploadModal" onclick="uploadFunc('about_userfile3')">Click to change About Us Third Slide</a>
						</div>
					</div> <br> <br> <br>

					<div class="form-row align-center justify-content-center">
						<input type="submit" class="btn btn-info btn-lg" style="width: 300px;" value="Save" />
					</div> <br> 

					</div>
						

					</form>
					<script>
						function uploadFunc(name){
							$('#ImageUploadModal #id').val(name);
						}
					</script>


								  <!-- Edit Modal -->
				<div class="modal fade" id="ImageUploadModal" tabindex="-1" role="dialog" aria-labelledby="ImageUploadModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('provide/update_barangay_info_img'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="userfile">Image</label>
							  <input type="file" class="form-control-file form-control-sm" id="userfile" name="userfile" placeholder="" 
							   style="padding-bottom: 15px;" required>
							</div>
						  </div> <br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Save" />
					  </div>
					  </form>
					</div>
				  </div>
				</div>

<script>
  $(function () {
    //$("#example1").DataTable({
    //  "responsive": true, "lengthChange": false, "autoWidth": false,
    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');;
	
	$('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
	  "lengthMenu": [3],
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
	  
    });

  });

		  // Select the target node.
		var target = document.querySelector('tbody')

		// Create an observer instance.
		var observer = new MutationObserver(function(mutations) {
			$('#example2_length').attr('style', 'color: white; padding-right: 20px;');
			$('#example2_filter').attr('style', 'color: white;'); 
			$('#example2_info').attr('style', 'color: white;');
			$('#example2_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 
		});

		var observer2 = new MutationObserver(function(mutations) {
			$('#example3_length').attr('style', 'color: white; padding-right: 20px;');
			$('#example3_filter').attr('style', 'color: white;'); 
			$('#example3_info').attr('style', 'color: white;');
			$('#example3_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 
		});

		// Pass in the target node, as well as the observer options.
		observer.observe(target, {
			attributes:    true,
			childList:     true,
			characterData: true
		});

		observer2.observe(target, {
			attributes:    true,
			childList:     true,
			characterData: true
		});
						
				</script>
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
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/event_01.jpg" alt="Story-Image">
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
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/event_02.jpg" alt="Story-Image">
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
</section> -->

<!--====  End of Section comment  ====-->

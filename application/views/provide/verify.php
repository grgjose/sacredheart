
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<!-- Page Title -->
				<h1>List of Residents</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>

				<br> <br><br>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
				    <th>Picture</th>
                    <th>Username</th>

					<th>Email</th>
					<th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th -->
                    <th>Address</th>
                    <th>Contact #</th>
					<th>Approved</th>
					<th>Actions</th>


                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($users as $user){ ?>
					<?php if($user->usertype == 3){ ?>
                  <tr>
				    <td id="userfile_<?php echo $user->user_id; ?>"><img src="<?php echo base_url() ?>assets/files/users/<?php echo $user->userfile; ?>" width="100" height="100" ></td>
					<td id="username_<?php echo $user->user_id; ?>"><?php echo $user->username; ?></td>

					<td id="email_<?php echo $user->user_id; ?>"><?php echo $user->email; ?></td>
					<td id="fname_<?php echo $user->user_id; ?>"><?php echo $user->fname; ?></td>
					<td id="mname_<?php echo $user->user_id; ?>"><?php echo $user->mname; ?></td>
					<td id="lname_<?php echo $user->user_id; ?>"><?php echo $user->lname; ?></td>
					<td id="address_<?php echo $user->user_id; ?>"><?php echo $user->address; ?></td>
					<td id="contact_<?php echo $user->user_id; ?>"><?php echo $user->contact; ?></td>

					<td id="approved_<?php echo $user->user_id; ?>">
						<?php if($user->approved == 0){ echo "Email not yet validated"; } ?>
						<?php if($user->approved == 1){ echo "Email is validated"; } ?>
						<?php if($user->approved == 2){ echo "Fully Validated"; } ?>
					</td>

					<td>
						<?php if($user->approved < 2){ ?>
						<button class="btn btn-success btn-sm" onclick="approveFunc(<?php echo $user->user_id; ?>)"> Approve</button> <br>
						<button class="btn btn-danger btn-sm" onclick="rejectFunc(<?php echo $user->user_id; ?>)"> Reject</button>
						<?php } ?>
					</td>

                  </tr>
                  <?php } ?>
				  <?php } ?>
                  </tfoot>
                </table>

				<div style="display: none;" id="submitForm">
					<?php $attributes = array('id' => 'EditModalForm'); echo form_open('provide/user_destiny', $attributes); ?>
						<input type="hidden" name="id" id="id" value="" >
						<input type="hidden" name="type" id="type" value="" >
					<?php echo form_close(); ?>
				</div>


				<script>
					
				function approveFunc(id){
					$('#EditModalForm #id').val(id);
					$('#EditModalForm #type').val("approve");
					$('#EditModalForm').submit();
				}

				function rejectFunc(id){
					$('#EditModalForm #id').val(id);
					$('#EditModalForm #type').val("reject");
					$('#EditModalForm').submit();
				}

				</script>


				<style>

				.results tr[visible='false'],
				.no-result{
				  display:none;
				}

				.results tr[visible='true']{
				  display:table-row;
				}

				.counter{
				  padding:8px; 
				  color:#ccc;
				}
				</style>




				<script>
  $(function () {
    //$("#example1").DataTable({
    //  "responsive": true, "lengthChange": false, "autoWidth": false,
    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
	  "lengthMenu": [4, 10, 20],
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
	  "lengthMenu": [4],
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

	<!-- Login Window -->
	<div aria-hidden="true" aria-labelledby="ViewResidentModal" class="modal fade" id="ViewResidentModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body" style="padding-top:0px;">
					<div class="form-title text-center" style="padding-bottom: 20px">
						<h4>Resident Details</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<div class="form-group">
							<image src="">
						</div>	
						<div class="form-group">
							<input class="form-control" id="email" name="email" placeholder="Enter your email address..." type="email" disabled>
						</div>
						<div class="form-group">
							<input class="form-control" id="password" name="password" placeholder="Enter your password..." type="password" disabled>
						</div>
						<button class="btn btn-info btn-block btn-round" type="submit">Login</button> 
						<br>

					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">

				</div>
			</div>
		</div>
	</div>

<!-- ********************************
     *         CREATE SERVICE       *
	 ******************************** -->
<section class="section create-stories pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/event_04.jpg" alt="Story-Image">
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
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/projects/event_06.jpg" alt="Story-Image">
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

<!--====  End of Section comment  ====-->

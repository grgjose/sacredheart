
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<!-- Page Title -->
				<h1>List of Complaints</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>

				<br> <br> <br>

				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Description</th>
                <th>Letter</th>
                <th>Complaintant</th>
                <th>Status</th>
				<th>Date Created</th>
				<th>Remarks</th>
				<th>Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($complaints as $complaint){ ?>
                <tr>
				<td><?php echo $complaint->complaint_description; ?></td>
				<td><a href="<?php echo base_url() . 'assets/files/complaints/' . $complaint->complaint_letter; ?>"><?php echo $complaint->complaint_letter; ?></a></td>
				<td><?php foreach($users as $user){ if($user->user_id == $complaint->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?></td>
                <td>
				<?php if($complaint->status == 1){?> <span class="badge badge-success">Done</span> <?php }?>
				<?php if($complaint->status == 0){?> <span class="badge badge-danger">Pending</span> <?php }?>
				</td>
				<td><?php echo $complaint->date_created; ?></td>
				<td>
					<button class="btn btn-info text-justify text-center" 
					data-toggle="modal" data-target="#ViewRemarksModal"
					onclick="viewRemarksFunc(<?php echo $complaint->complaint_id; ?>)" >
					<span class="ti-eye"></span>
					</button>
				</td>
				<td>
					<button class="btn btn-<?php if($complaint->status == 1){ echo "danger"; } else { echo "success"; }?> text-justify text-center" 
					data-toggle="modal" data-target="#<?php if($complaint->status == 1){ echo "DeleteModal"; } else { echo "EditModal"; }?>"
					onclick="<?php if($complaint->status == 1){ echo "delFunc"; } else { echo "editFunc"; }?>(<?php echo $complaint->complaint_id; ?>)" >
					<span style="font-size: 12px; font-family: Verdana, sans-serif;"><?php if($complaint->status == 1){ echo "Set as Pending"; } else { echo "Set as Completed"; }?></span>
					</button>

					<button class="btn btn-warning text-justify text-center" 
					data-toggle="modal" data-target="#AddRemarkModal"
					onclick="addRemarkFunc(<?php echo $complaint->complaint_id; ?>,<?php echo $complaint->status; ?>)" >
					<span class="ti-plus"></span><span style="font-size: 12px; font-family: Verdana, sans-serif;">Remarks</span>
					</button>
				</td>

                </tr>
                <?php } ?>
                </tfoot>
				</table>
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
					function editFunc(id)
					{
						$('#EditModal #id').val(id);
					
					}

					function delFunc(id)
					{
						$('#DeleteModal #id').val(id);
					
					}

					function addRemarkFunc(id, st)
					{
						$('#AddRemarkModal #id').val(id);
						$('#AddRemarkModal #status').val(st);
					}

					function viewRemarksFunc(id)
					{
						$('#view-remarks-modal-body').html('');
						$('#view-remarks-modal-body').load('<?php echo base_url()."provide/view_remarks/"; ?>' + String(id) + '/2');
					}
			    </script>

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

<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Give Remarks</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<?php $attributes = array('id' => 'EditModalForm'); echo form_open('provide/set_status_as_approved', $attributes); ?>
			<div class="form-row">
			<input type="hidden" id="type" name="type"  value="complaints">
			<input type="hidden" id="id" name="id"  value="">

			<div class="col">
				<label>Remarks</label>
				<textarea class="form-control" name="remarks" rows="3" required></textarea>
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

<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Give Remarks</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<?php $attributes = array('id' => 'DeleteModalForm'); echo form_open('provide/set_status_as_pending', $attributes); ?>
			<div class="form-row">
			<input type="hidden" id="type" name="type"  value="complaints">
			<input type="hidden" id="id" name="id"  value="">
			<div class="col">
				<label>Remarks</label>
				<textarea class="form-control" name="remarks" rows="3" required></textarea>
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

<!-- Add Remark Modal -->
<div class="modal fade" id="AddRemarkModal" tabindex="-1" role="dialog" aria-labelledby="AddRemarkModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Add Remarks</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<?php $attributes = array('id' => 'AddRemarkForm'); echo form_open('provide/add_remark', $attributes); ?>
			<div class="form-row">
			<input type="hidden" id="type" name="type"  value="complaints">
			<input type="hidden" id="id" name="id"  value="">
			<input type="hidden" id="status" name="status"  value="">
			<div class="col">
				<label>Remarks</label>
				<textarea class="form-control" name="remarks" rows="3" required></textarea>
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

<!-- View Remark Modal -->
<div class="modal fade" id="ViewRemarksModal" tabindex="-1" role="dialog" aria-labelledby="ViewRemarksModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">View Remarks</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div id="view-remarks-modal-body" class="modal-body">
							
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
	</div>
</div>

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
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/events/event_04.jpg" alt="Story-Image">
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
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/files/events/event_06.jpg" alt="Story-Image">
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

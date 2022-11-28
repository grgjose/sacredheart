
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12 m-auto">
				<!-- Page Title -->
				<h1>Filed Complaints</h1>
				<br> <br> 

				<table id="myTable" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="text-center">Date Requested</th>
					  <th class="text-center">Complaint Description</th>
					  <th class="text-center">Complaint Letter</th>
					  <th style="width: 300px;" class="text-center">Remarks</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($complaints as $complaint) { ?>
					<trstyle="<?php if($complaint->seen == 1){ echo "background-color: yellow"; } ?>;">
						<td style="height: 30px;" class="text-center"><?php echo $complaint->date_created; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $complaint->complaint_description; ?></td>
						<td style="height: 30px;" class="text-center"><a class="btn btn-info" href="#" onclick="Download('<?php echo base_url() . 'home/download_file/1/' . $complaint->complaint_letter; ?>')">Download File</a></td>
						<td style="height: 30px;" class="text-center">
							<button class="btn btn-info text-justify text-center" 
							data-toggle="modal" data-target="#ViewRemarksModal"
							onclick="viewRemarksFunc(<?php echo $complaint->complaint_id; ?>,2)" >
							<span class="ti-eye"></span>
							</button>
							<button class="btn btn-warning text-justify text-center" 
							data-toggle="modal" data-target="#AddRemarkModal"
							onclick="addRemarkFunc(<?php echo $complaint->complaint_id; ?>,<?php echo $complaint->status; ?>,'complaints')" >
							<span class="ti-plus"></span><span style="font-size: 12px; font-family: Verdana, sans-serif;">Remarks</span>
							</button>
						</td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
				<script>
				function Download(url) {
					window.open(url);
				};
				</script>
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
			<div class="col-sm-12 m-auto">
				<!-- Page Title -->
				<h1>Document Requested</h1>
				<br> <br> 

				<table id="myTable1" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="text-center">Date Requested</th>
					  <th class="text-center">Document Type</th>
					  <th class="text-center">Document Purpose</th>
					  <th class="text-center">Date Needed</th>
					  <th style="width: 300px;" class="text-center">Remarks</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($requests as $request) { ?>
					<tr  style="<?php if($request->seen == 1){ echo "background-color: yellow"; } ?>;">
						<td style="height: 30px;" class="text-center"><?php echo $request->date_created; ?></td>
						<td style="height: 30px;" class="text-center">
							<?php foreach($request_types as $type){ if($type->request_type_id == $request->document_type){ echo $type->request_type; break; }}?>
						</td>
						<td style="height: 30px;" class="text-center"><?php echo $request->document_purpose; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $request->date_needed; ?></td>
						<td style="height: 30px;" class="text-center">
						<button class="btn btn-info text-justify text-center" 
						data-toggle="modal" data-target="#ViewRemarksModal"
						onclick="viewRemarksFunc(<?php echo $request->request_id; ?>,1)" >
						<span class="ti-eye"></span>
						</button>
						<button class="btn btn-warning text-justify text-center" 
						data-toggle="modal" data-target="#AddRemarkModal"
						onclick="addRemarkFunc(<?php echo $request->request_id; ?>,<?php echo $request->status; ?>,'requests')" >
						<span class="ti-plus"></span><span style="font-size: 12px; font-family: Verdana, sans-serif;">Remarks</span>
						</button>
						</td>
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
			<div class="col-sm-12 m-auto">
				<!-- Page Title -->
				<h1>Filed Assistance Requests</h1>
				<br> <br> 

				<table id="myTable2" class="table table-hover table-bordered results" style="font-size: 13px;" width="100%">
				  <thead>
					<tr>
					  <th class="text-center">Date Requested</th>
					  <th class="text-center">Assistance Type</th>
					  <th class="text-center">Assistance Purpose</th>
					  <th class="text-center">Date Needed</th>
					  <th style="width: 300px;" class="text-center">Remarks</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($assistance as $assist) { ?>
					<tr style="<?php if($assist->seen == 1){ echo "background-color: yellow"; } ?>;">
						<td style="height: 30px;" class="text-center"><?php echo $assist->date_created; ?></td>
						<td style="height: 30px;" class="text-center">
							<?php foreach($assistance_types as $type){ if($type->assistance_type_id == $assist->assistance_type){ echo $type->assistance_type; break; }}?>
						</td>
						<td style="height: 30px;" class="text-center"><?php echo $assist->assistance_purpose; ?></td>
						<td style="height: 30px;" class="text-center"><?php echo $assist->date_needed; ?></td>
						<td style="height: 30px;" class="text-center">
						<button class="btn btn-info text-justify text-center" 
						data-toggle="modal" data-target="#ViewRemarksModal"
						onclick="viewRemarksFunc(<?php echo $assist->assistance_id; ?>,3)" >
						<span class="ti-eye"></span>
						</button>
						<button class="btn btn-warning text-justify text-center" 
						data-toggle="modal" data-target="#AddRemarkModal"
						onclick="addRemarkFunc(<?php echo $assist->assistance_id; ?>,<?php echo $assist->status; ?>,'assistance')" >
						<span class="ti-plus"></span><span style="font-size: 12px; font-family: Verdana, sans-serif;">Remarks</span>
						</button>
						</td>
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

<script>
	function editFunc(id)
	{
		$('#EditModal #id').val(id);
					
	}

	function delFunc(id)
	{
		$('#DeleteModal #id').val(id);
					
	}
	function addRemarkFunc(id, st, tp)
	{
		$('#AddRemarkModal #id').val(id);
		$('#AddRemarkModal #type').val(tp);
		$('#AddRemarkModal #status').val(st);
	}

	function viewRemarksFunc(id, tp)
	{
		$('#view-remarks-modal-body').html('');
		$('#view-remarks-modal-body').load('<?php echo base_url()."home/view_remarks/"; ?>' + String(id) + '/' + String(tp));
	}
</script>

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
		<?php $attributes = array('id' => 'AddRemarkForm'); echo form_open('home/add_remark', $attributes); ?>
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

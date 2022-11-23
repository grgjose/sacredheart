
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Senior Citizens</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Senior Citizens</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="padding-top: 10px;">Senior Citizens Table</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Senior</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Senior ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Current/Previous Job</th>
					<th>Year</th>
					<th>Date Created</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($seniors as $senior){ ?>
                  <tr>
				    <td id="senior_card_id_<?php echo $senior->senior_id; ?>"><?php echo $senior->senior_card_id; ?></td>
                    <td id="fname_<?php echo $senior->senior_id; ?>"><?php echo $senior->fname; ?></td>
					<td id="mname_<?php echo $senior->senior_id; ?>"><?php echo $senior->mname; ?></td>
					<td id="lname_<?php echo $senior->senior_id; ?>"><?php echo $senior->lname; ?></td>
					<td id="age_<?php echo $senior->senior_id; ?>"><?php echo $senior->age; ?></td>
					<td id="job_<?php echo $senior->senior_id; ?>"><?php echo $senior->job; ?></td>
					<td id="year_<?php echo $senior->senior_id; ?>"><?php echo $senior->year; ?></td>
					<td id="date_created_<?php echo $senior->senior_id; ?>"><?php echo $senior->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal"
						onclick="editFunc(<?php echo $senior->senior_id; ?>)">
							<span class="fas fa-pen"></span>
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal"
						onclick="delFunc(<?php echo $senior->senior_id; ?>)">
							<span class="fas fa-times"></span>
						</button>
					</td>

                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id){

					$('#EditModal #senior_id').val(id);
					$('#EditModal #fname').val($("#fname_"+id).html());
					$('#EditModal #mname').val($("#mname_"+id).html());
					$('#EditModal #lname').val($("#lname_"+id).html());
					$('#EditModal #age').val($("#age_"+id).html());
					$('#EditModal #job').val($("#job_"+id).html());
					$('#EditModal #year').val($("#year_"+id).html());
					$('#EditModal #senior_card_id').val($("#senior_card_id_"+id).html());

				}

				function delFunc(id){
					$('#DeleteModal #senior_id').val(id);
					$('#DeleteModal #fname').val($("#fname_"+id).html());
					$('#DeleteModal #senior_name').html(
						$("#fname_"+id).html() + " " + $("#mname_"+id).html() + " " + $("#lname_"+id).html() + "?");
				}

			  </script>

			  <!-- Add Modal -->
				<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Ayuda Receiver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open('admin/add_senior'); ?>
						  <div class="form-row">
							<div class="col">
							  <label for="fname">First Name</label>
							  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
							</div>
							<div class="col">
							  <label for="mname">Middle Name</label>
							  <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle name">
							</div>
							<div class="col">
							  <label for="lname">Last Name</label>
							  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="age">Age</label>
							  <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
							</div>
							<div class="col">
							  <label for="job">Current/Previous Job</label>
							  <input type="text" class="form-control" id="job" name="job" placeholder="Current / Previous Job" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="year">Year</label>
							  <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
							</div>
							<div class="col">
							  <label for="senior_card_id">Senior Card ID</label>
							  <input type="text" class="form-control" id="senior_card_id" name="senior_card_id" placeholder="Senior Card ID" required>
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

			  <!-- Edit Modal -->
				<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Ayuda Receiver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open('admin/update_senior'); ?>
						  <input type="hidden" id="senior_id" name="senior_id" value="" required>
						  <div class="form-row">
							<div class="col">
							  <label for="fname">First Name</label>
							  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
							</div>
							<div class="col">
							  <label for="mname">Middle Name</label>
							  <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle name">
							</div>
							<div class="col">
							  <label for="lname">Last Name</label>
							  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="age">Age</label>
							  <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
							</div>
							<div class="col">
							  <label for="job">Current/Previous Job</label>
							  <input type="text" class="form-control" id="job" name="job" placeholder="Current / Previous Job" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="year">Year</label>
							  <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
							</div>
							<div class="col">
							  <label for="senior_card_id">Senior Card ID</label>
							  <input type="text" class="form-control" id="senior_card_id" name="senior_card_id" placeholder="Senior Card ID" required>
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
						<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open('admin/delete_senior'); ?>
						  <div class="form-row">
						    <input type="hidden" id="senior_id" name="senior_id"  value="">
							<input type="hidden" id="fname" name="fname"  value="">
								<h6>Are you sure you wanted to delete this Senior Citizen? &nbsp;</h6>
								<h6 id="senior_name"></h6>
							<br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Delete" />
					  </div>
					  </form>
					</div>
				  </div>
				</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

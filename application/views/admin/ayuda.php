
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ayuda Receivers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ayuda Receivers</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Ayuda Receivers Table</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Receiver</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Current Job</th>
					<th>Date To Receive</th>
					<th>Is Received</th>
					<th>Date Created</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($receivers as $receiver){ ?>
                  <tr>
                    <td id="fname_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->fname; ?></td>
					<td id="mname_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->mname; ?></td>
					<td id="lname_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->lname; ?></td>
					<td id="age_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->age; ?></td>
					<td id="current_job_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->current_job; ?></td>
					<td id="date_to_receive_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->date_to_receive; ?></td>
					<td id="is_received_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->is_received; ?></td>
					<td id="date_created_<?php echo $receiver->receiver_id; ?>"><?php echo $receiver->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal"
						onclick="editFunc(<?php echo $receiver->receiver_id; ?>)">
							<span class="fas fa-pen"></span>
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal"
						onclick="delFunc(<?php echo $receiver->receiver_id; ?>)">
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

					$('#EditModal #receiver_id').val(id);
					$('#EditModal #fname').val($("#fname_"+id).html());
					$('#EditModal #mname').val($("#mname_"+id).html());
					$('#EditModal #lname').val($("#lname_"+id).html());
					$('#EditModal #age').val($("#age_"+id).html());
					$('#EditModal #current_job').val($("#current_job_"+id).html());
					
					var theDate = $("#date_to_receive_"+id).html();
					var input = theDate;
					var output = input.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

					$('#EditModal #date_to_receive').val(output);
					$('#EditModal #is_received').val($("#is_received_"+id).html());

				}

				function delFunc(id){
					$('#DeleteModal #receiver_id').val(id);
					$('#DeleteModal #fname').val($("#fname_"+id).html());
					$('#DeleteModal #receiver_name').html(
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
						<?php echo form_open('admin/add_receiver'); ?>
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
							  <label for="current_job">Current Job</label>
							  <input type="text" class="form-control" id="current_job" name="current_job" placeholder="Current Job" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="date_to_receive">Date To Receive</label>
							  <input type="date" class="form-control" id="date_to_receive" name="date_to_receive" placeholder="Date To Receive" required>
							</div>
							<div class="col">
							  <label for="is_received">Is Received</label>
							  <select class="form-control" id="is_received" name="is_received" placeholder="Is Received?" required>
								  <option value="Yes">Yes</option>
								  <option value="No">No</option>
							  </select>
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
						<?php echo form_open('admin/update_receiver'); ?>
						  <div class="form-row">
						    <input type="hidden" id="receiver_id" name="receiver_id"  value="">
							<div class="col">
							  <label for="fname">First Name</label>
							  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
							</div>
							<div class="col">
							  <label for="mname">Middle Name</label>
							  <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle name">
							</div>
							<div class="col">
							  <label for="lname">Last Name</label>
							  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="age">Age</label>
							  <input type="text" class="form-control" id="age" name="age" placeholder="Age">
							</div>
							<div class="col">
							  <label for="current_job">Current Job</label>
							  <input type="text" class="form-control" id="current_job" name="current_job" placeholder="Current Job">
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="date_to_receive">Date To Receive</label>
							  <input type="date" class="form-control" id="date_to_receive" name="date_to_receive" placeholder="Date To Receive">
							</div>
							<div class="col">
							  <label for="is_received">Is Received</label>
							  <select class="form-control" id="is_received" name="is_received" placeholder="Is Received?">
								  <option value="Yes">Yes</option>
								  <option value="No">No</option>
							  </select>
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
						<?php echo form_open('admin/delete_receiver'); ?>
						  <div class="form-row">
						    <input type="hidden" id="receiver_id" name="receiver_id"  value="">
							<input type="hidden" id="fname" name="fname"  value="">
								<h6>Are you sure you wanted to delete this Receiver? &nbsp;</h6>
								<h6 id="receiver_name"></h6>
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


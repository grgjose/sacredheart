
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Filed Complaints</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Filed Complaints</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Filed Complaints Table</h3>
				<!-- button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Request</button -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
					<td><?php echo $complaint->remarks; ?></td>
					<td>
						<button class="btn btn-<?php if($complaint->status == 1){ echo "danger"; } else { echo "success"; }?> text-justify text-center" 
						data-toggle="modal" data-target="#<?php if($complaint->status == 1){ echo "DeleteModal"; } else { echo "EditModal"; }?>"
						onclick="<?php if($complaint->status == 1){ echo "delFunc"; } else { echo "editFunc"; }?>(<?php echo $complaint->complaint_id; ?>)" >
						<?php if($complaint->status == 1){ echo "Set as Pending"; } else { echo "Set as Completed"; }?>  &nbsp;</span>
						</button>
					</td>

                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id)
				{
					$('#EditModal #id').val(id);
					
				}

				function delFunc(id)
				{
					$('#DeleteModal #id').val(id);
					
				}

			  </script>

			  <!-- Add Modal -->
				<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Document Request</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open('admin/add_request'); ?>
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
						<?php $attributes = array('id' => 'EditModalForm'); echo form_open('admin/set_status_as_approved', $attributes); ?>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Ayuda Receiver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'DeleteModalForm'); echo form_open('admin/set_status_as_pending', $attributes); ?>
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

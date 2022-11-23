
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assistance Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assistance Requests</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Assistance Requests Table</h3>
				<!-- button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Request</button -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Assistance Type</th>
                    <th>Purpose</th>
                    <th>Complaintant</th>
                    <th>Date Needed</th>
                    <th>Status</th>
					<th>Date Created</th>
					<th>Remarks</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($assistance as $assist){ ?>
                  <tr>
                    <td><?php foreach($assistance_types as $type){ if($assist->assistance_type == $type->assistance_type_id){ echo $type->assistance_type; break; } } ?></td>
					<td><?php echo $assist->assistance_purpose; ?></td>
					<td><?php foreach($users as $user){ if($user->user_id == $assist->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?></td>
					<td><?php echo $assist->date_needed; ?></td>
                    <td>
					<?php if($assist->status == 1){?> <span class="badge badge-success">Done</span> <?php }?>
					<?php if($assist->status == 0){?> <span class="badge badge-danger">Pending</span> <?php }?>
					</td>
					<td><?php echo $assist->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" 
						data-toggle="modal" data-target="#ViewRemarksModal"
						onclick="viewRemarksFunc(<?php echo $assist->assistance_id; ?>)" >
						View Remarks</span>
						</button>
					</td>
					<td>
						<button style="width:150px;"
						class="btn btn-<?php if($assist->status == 1){ echo "danger"; } else { echo "success"; }?> text-justify text-center" 
						data-toggle="modal" data-target="#<?php if($assist->status == 1){ echo "DeleteModal"; } else { echo "EditModal"; }?>"
						onclick="<?php if($assist->status == 1){ echo "delFunc"; } else { echo "editFunc"; }?>(<?php echo $assist->assistance_id; ?>)" >
						<?php if($assist->status == 1){ echo "Set as Pending"; } else { echo "Set as Completed"; }?>  &nbsp;</span>
						</button>
						
						<button class="btn btn-warning text-justify text-center" 
						data-toggle="modal" data-target="#AddRemarkModal"
						onclick="addRemarkFunc(<?php echo $assist->assistance_id; ?>,<?php echo $assist->status; ?>)" >
						Add Remarks</span>
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

				function addRemarkFunc(id, st)
				{
					$('#AddRemarkModal #id').val(id);
					$('#AddRemarkModal #status').val(st);
				}

				function viewRemarksFunc(id)
				{
					$('#view-remarks-modal-body').html('');
					$('#view-remarks-modal-body').load('<?php echo base_url()."admin/view_remarks/"; ?>' + String(id) + '/3');
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
							  <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="date_to_receive" name="date_to_receive" placeholder="Date To Receive" required>
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
						<h5 class="modal-title" id="exampleModalLabel">Set as Completed Remark</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'EditModalForm'); echo form_open('admin/set_status_as_approved', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="type" name="type"  value="assistance">
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
						<h5 class="modal-title" id="exampleModalLabel">Set as Pending Remark</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'DeleteModalForm'); echo form_open('admin/set_status_as_pending', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="type" name="type"  value="assistance">
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
						<?php $attributes = array('id' => 'AddRemarkForm'); echo form_open('admin/add_remark', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="type" name="type"  value="assistance">
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

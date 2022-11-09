
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users List</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Users List Table</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add User</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
				    <th>Picture</th>
                    <th>Username</th>
                    <th>Password</th>
					<th>Usertype</th>
					<th>Email</th>
					<th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th -->
                    <th>Address</th>
                    <th>Contact #</th>
					<th>Approved</th>
					<th>Date Created</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($users as $user){ ?>
                  <tr>
				    <td id="userfile_<?php echo $user->user_id; ?>"><img src="<?php echo base_url() ?>assets/files/users/<?php echo $user->userfile; ?>" width="100" height="100" ></td>
					<td id="username_<?php echo $user->user_id; ?>"><?php echo $user->username; ?></td>
					<td id="password_<?php echo $user->user_id; ?>"><?php echo $user->password; ?></td>
					<td id="usertype_<?php echo $user->user_id; ?>">
						<?php if($user->usertype == 1){ echo "admin"; } if($user->usertype == 2){ echo "official"; } if($user->usertype == 3){ echo "resident"; }?>
					</td>
					<td id="email_<?php echo $user->user_id; ?>"><?php echo $user->email; ?></td>
					<td id="fname_<?php echo $user->user_id; ?>"><?php echo $user->fname; ?></td>
					<td id="mname_<?php echo $user->user_id; ?>"><?php echo $user->mname; ?></td>
					<td id="lname_<?php echo $user->user_id; ?>"><?php echo $user->lname; ?></td>
					<td id="address_<?php echo $user->user_id; ?>"><?php echo $user->address; ?></td>
					<td id="contact_<?php echo $user->user_id; ?>"><?php echo $user->contact; ?></td>
					<td>
						<?php if($user->approved == 1){?> <span class="badge badge-success">Approved</span> <?php }?>
						<?php if($user->approved == 0){?> <span class="badge badge-danger">Not yet Approved</span> <?php }?>
					</td>
					<td id="date_created_<?php echo $user->user_id; ?>"><?php echo $user->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px;"
						onclick="editFunc(<?php echo $user->user_id; ?>)">
							<i class="fas fa-pen" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></i>
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px;"
						onclick="editFunc(<?php echo $user->user_id; ?>)">
							<i class="fas fa-times" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></i>
						</button>
						<button class="btn btn-success text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px;"
						onclick="editFunc(<?php echo $user->user_id; ?>)">
							<i class="fas fa-check" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></i>
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
						<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/add_user'); ?>
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
							  <label for="usertype">Usertype</label>
							  <select class="form-control" id="usertype" name="usertype" placeholder="Usertype" required>
								<option value="3" selected>Resident</option>
								<option value="2">Official</option>
								<option value="1">Admin</option>
							  </select>
							</div>
							<div class="col">
							  <label for="email">Email</label>
							  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="password">Password</label>
							  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
							<div class="col">
							  <label for="c_password">Confirm Password</label>
							  <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Password" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="address">Address</label>
							  <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="contact">Contact</label>
							  <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact #" required>
							</div>
							<div class="col">
							  <label for="userfile">Picture</label>
							  <input type="file" class="form-control-file form-control-sm" id="userfile" name="userfile" placeholder="Profile Pic" 
							   style="padding-bottom: 15px;">
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

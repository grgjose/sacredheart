
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
						<?php if($user->usertype == 1){ echo "Admin"; } if($user->usertype == 2){ echo "Official"; } if($user->usertype == 3){ echo "Resident"; }?>
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
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="editFunc(<?php echo $user->user_id; ?>,'<?php echo $user->userfile; ?>')">
							<span class="fas fa-pen" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="delFunc(<?php echo $user->user_id; ?>)">
							<span class="fas fa-times" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
						<button class="btn btn-success text-justify text-center" data-toggle="modal" data-target="#ApproveModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="approveFunc(<?php echo $user->user_id; ?>)">
							<span class="fas fa-check" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
					</td>

                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id, uf){

					$('#EditModal #id').val(id);
					$('#EditModal #fname').val($("#fname_"+id).html());
					$('#EditModal #mname').val($("#mname_"+id).html());
					$('#EditModal #lname').val($("#lname_"+id).html());

					if($("#usertype_"+id).html().trim() == "Resident"){ var x = 3; }
					if($("#usertype_"+id).html().trim() == "Official"){ var x = 2; }
					if($("#usertype_"+id).html().trim() == "Admin"){ var x = 1; }

					$('#EditModal #usertype').val(x);

					$('#EditModal #email').val($("#email_"+id).html());

					$('#EditModal #password').val($("#password_"+id).html());
					$('#EditModal #c_password').val($("#password_"+id).html());

					$('#EditModal #address').val($("#address_"+id).html());
					$('#EditModal #contact').val($("#contact_"+id).html());
					$('#EditModal #prev_userfile').val(uf);

				}

				function delFunc(id){
					$('#DeleteModal #id').val(id);
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
						<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/edit_user'); ?>
						  <input type="hidden" id="id" name="id" value="" />
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
							   <input type="hidden" id="prev_userfile" name="prev_userfile" value="" />
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
						<h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/delete_user'); ?>
						  <div class="form-row">
							<div class="col">
							  <input type="hidden" id="id" name="id" value="" />
							  <label for="fname">Are you sure you want to delete this user?</label>
							</div>
						  </div> <br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Delete" />
					  </div>
					  </form>
					</div>
				  </div>
				</div>

			  <!-- Approve Modal -->
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

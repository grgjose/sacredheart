
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chatbot Replies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chatbot Replies</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Chatbot List of Replies</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Reply</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Date Created</th>
				    <th style="width:600px;">Reply</th>
					<th style="width:100px;">Actions</th>
                    <th>Next Replies</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($replies as $reply){ ?>
                  <tr>
				    <td id="date_created_<?php echo $reply->reply_id; ?>"><?php echo $reply->date_created; ?></td>
				    <td id="reply_<?php echo $reply->reply_id; ?>"><?php echo $reply->reply; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="editFunc(<?php echo $reply->reply_id; ?>)">
							<span class="fas fa-plus" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="delFunc(<?php echo $reply->reply_id; ?>)">
							<span class="fas fa-minus" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
					</td>
					<td>
						<?php $ids = $reply->reply_suggested; $many_id = explode(",", $ids); ?>
						<?php foreach($many_id as $id){ foreach($replies as $r){ if($id == $r->reply_id){ ?> 
							<p><?php echo $r->reply; ?><p>
						<?php }}}?>
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

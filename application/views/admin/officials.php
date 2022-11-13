
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Officials List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Officials List</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Officials List Table</h3>
				<!-- button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add User</button -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
				    <th>Picture</th>
					<th>Email</th>
					<th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact #</th>
					<th>Position</th>
					<th>Display Picture</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($users as $user){ ?>
					<?php if($user->usertype != 3){ ?>
                  <tr>
				    <td id="userfile_<?php echo $user->user_id; ?>"><img src="<?php echo base_url() ?>assets/files/users/<?php echo $user->userfile; ?>" width="100" height="100" ></td>
					<td id="email_<?php echo $user->user_id; ?>"><?php echo $user->email; ?></td>
					<td id="fname_<?php echo $user->user_id; ?>"><?php echo $user->fname; ?></td>
					<td id="mname_<?php echo $user->user_id; ?>"><?php echo $user->mname; ?></td>
					<td id="lname_<?php echo $user->user_id; ?>"><?php echo $user->lname; ?></td>
					<td id="contact_<?php echo $user->user_id; ?>"><?php echo $user->contact; ?></td>
					<td id="position_<?php echo $user->user_id; ?>"><?php echo $user->position; ?></td>
					<td id="dp_userfile_<?php echo $user->user_id; ?>"><img src="<?php echo base_url() ?>assets/files/officials/<?php echo $user->dp_userfile; ?>" width="140" height="200" ></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="editFunc(<?php echo $user->user_id; ?>,'<?php echo $user->dp_userfile; ?>')">
							<span class="fas fa-pen" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>
					</td>

                  </tr>
                  <?php } ?>
				  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id, uf){

					$('#EditModal #id').val(id);
					$('#EditModal #position').val($("#position_"+id).html());
					$('#EditModal #prev_dp_userfile').val(uf);

				}
			  </script>

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
						<?php echo form_open_multipart('admin/edit_official'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="position">Position</label>
							  <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="prev_dp_userfile">Display Picture</label>
							  <input type="file" class="form-control-file form-control-sm" id="dp_userfile" name="dp_userfile" placeholder="Display Picture" 
							   style="padding-bottom: 15px;">
							   <input type="hidden" id="prev_dp_userfile" name="prev_dp_userfile" value="" />
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

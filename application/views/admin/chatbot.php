
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
					<th style="width:100px;">From</th>
				    <th style="width:600px;">Reply</th>
					<th style="width:100px;">Actions</th>
                    <th>Next Replies</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($replies as $reply){ ?>
                  <tr>
				    <td id="date_created_<?php echo $reply->reply_id; ?>"><?php echo $reply->date_created; ?></td>
					<td id="reply_from_<?php echo $reply->reply_id; ?>"><?php if($reply->reply_from == 1){ echo "Chatbot"; } else { echo "Human"; }  ?></td>
				    <td id="reply_<?php echo $reply->reply_id; ?>"><?php echo $reply->reply; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="editFunc(<?php echo $reply->reply_id; ?>,<?php echo $reply->reply_from; ?>,'<?php echo $reply->reply_suggested; ?>')">
							<span class="fas fa-plus" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>

						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="delFunc(<?php echo $reply->reply_id; ?>,<?php echo $reply->reply_from; ?>,'<?php echo $reply->reply_suggested; ?>')">
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
				function editFunc(id, fr, sg){
					$('#EditModal #id').val(id);
					
					var sgs = sg.split(',');
					var x = 0;

					$('#EditModal option').removeAttr("style");

					if(fr == 1){ $(".chatbot_option").attr("style","display: none;"); }
					if(fr == 0){ $(".human_option").attr("style","display: none;"); }

					for (let i = 0; i < sgs.length; i++) {
						$('#inc_option_'+ sgs[i]).attr("style","display: none;");
					}
				}

				function delFunc(id, fr, sg){
					$('#DeleteModal #id').val(id);

					var sgs = sg.split(',');
					var x = 0;

					$('#DeleteModal option').attr("style", "display: none;");
					for (let i = 0; i < sgs.length; i++) {
						$('#dec_option_'+ sgs[i]).removeAttr("style");
					}
				}
			  </script>

			  <!-- Add Modal -->
				<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Reply</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/add_chatbot_reply'); ?>
						  <div class="form-row">
							<div class="col">
							  <label for="reply">Reply</label>
							  <input type="text" class="form-control" id="reply" name="reply" placeholder="Reply" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="reply">From</label>
							  <select class="form-control" name="reply_from" required>
								<option style="height: 150px;" value="1" selected>Chatbot</option>
								<option style="height: 150px;" value="0">Human</option>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Reply</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/inc_chatbot_reply'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="fname">Select Reply to Add</label>
							  <select class="form-control" name="inc_reply" required>
								<?php $ctr = 0; foreach($replies as $reply){ ?>
									<option style="height: 150px;" class="<?php if($reply->$reply_from == 1){ echo 'chatbot_option'; } else{echo 'human_option';} ?>"
									 id="inc_option_<?php echo $reply->reply_id; ?>" 
									 value="<?php echo $reply->reply_id; ?>"><?php echo $reply->reply; ?></option>
								<?php } ?>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Reply</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/dec_chatbot_reply'); ?>
							<input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="fname">Select Reply to Remove</label>
							  <select class="form-control" name="dec_reply" required>
								<?php foreach($replies as $reply){ ?>
									<option id="dec_option_<?php echo $reply->reply_id; ?>" style="display: none;" value="<?php echo $reply->reply_id; ?>"><?php echo $reply->reply; ?></option>
								<?php } ?>
							  </select>
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
							  <input type="file" class="form-control-file form-control-sm" id="userfile" name="userfile" placeholder="Profile Pic" accept="image/*"
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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Puroks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Puroks</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Puroks Table</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Purok</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Purok</th>
					<th>Households</th>
					<th>Date Created</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($puroks as $purok){ ?>
                  <tr>
                    <td><?php echo $purok->purok_name; ?></td>
					<td><?php foreach($households as $household){ if($household->purok_id == $purok->purok_id) { echo $household->household_name .'<br>'; }} ?></td>
					<td><?php echo $purok->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="editFunc(<?php echo $purok->purok_id; ?>)">
							<span class="fas fa-plus" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>

						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="delFunc(<?php echo $purok->purok_id; ?>)">
							<span class="fas fa-minus" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
						</button>

						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#RemoveModal" 
						style="width: 30px; height: 30px; margin: 5px;"
						onclick="removeFunc(<?php echo $purok->purok_id; ?>)">
							<span class="fas fa-trash" style="display: flex; justify-content: center; align-items: center; font-size: 12px;"></span>
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
					$('#DeleteModal option').attr('style', 'display:none;');
					$('#DeleteModal .dec_option_'+id).removeAttr('style');
					$('#DeleteModal .dec_option_'+id+':first').attr('selected','');
				}

				function removeFunc(id)
				{
					$('#RemoveModal #id').val(id);
				}

			  </script>

			  <!-- Add Modal -->
				<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Purok</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/add_purok'); ?>
						  <input type="hidden" id="id" name="id" required>
						  <div class="form-row">
							<div class="col">
							  <label for="purok">Purok</label>
							  <input type="text" class="form-control" id="purok" name="purok" placeholder="Purok" required>
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
						<h5 class="modal-title" id="exampleModalLabel">Add Household</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/inc_household'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="household">Add Household</label>
							   <input type="text" class="form-control" id="household" name="household" placeholder="Household" required>
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
						<h5 class="modal-title" id="exampleModalLabel">Remove Household</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/dec_household'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="fname">Select Household to Remove</label>
							  <select class="form-control" id="dec_household" name="dec_household" required>
								<?php foreach($households as $household){ ?>
									<option class="dec_option_<?php echo $household->purok_id; ?>" style="display: none;" value="<?php echo $household->household_id; ?>"><?php echo $household->household_name; ?></option>
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

			  <!-- Remove Modal -->
				<div class="modal fade" id="RemoveModal" tabindex="-1" role="dialog" aria-labelledby="RemoveModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete Purok</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/delete_purok'); ?>
						  <input type="hidden" id="id" name="id" value="" />
						  <div class="form-row">
							<div class="col">
							  <label for="fname">Are you sure you want to Delete</label>

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

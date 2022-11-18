
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Document Request Types</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Document Request Types</li>
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
                <h3 class="card-title" style="padding-top: 10px;">Document Request Types Table</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Request Type</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Document Type</th>
					<th>Date Created</th>
					<th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($request_types as $type){ ?>
                  <tr>
                    <td><?php echo $type->request_type_id; ?></td>
					<td><?php echo $type->request_type; ?></td>
					<td><?php echo $type->date_created; ?></td>
					<td>
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal"
						onclick="editFunc(<?php echo $type->request_type_id; ?>,'<?php echo $type->request_type; ?>')" >
						<span class="fas fa-pen"></span>
						</button>

						<?php $show = true; foreach($requests as $request){?>
						<?php if($type->request_type_id == intval($request->document_type)){ $show = false; break; }?>
						<?php }?>

						<?php if($show == true){ ?>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal"
						onclick="delFunc(<?php echo $type->request_type_id; ?>)" >
						<span class="fas fa-times"></span>
						</button>
						<?php }?>
					</td>

                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id, ar)
				{
					$('#EditModal #id').val(id);
					$('#EditModal #dr_type').val(ar);
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
						<h5 class="modal-title" id="exampleModalLabel">Add Document Request Type</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open('admin/add_dr_type'); ?>
						  <div class="form-row">
							<div class="col">
							  <label for="ar_type">Document Request Type</label>
							  <input type="text" class="form-control" id="dr_type" name="dr_type" placeholder="Document Request Type" required>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Document Request Type</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'EditModalForm'); echo form_open('admin/edit_dr_type', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="id" name="id"  value="">
								<div class="col">
									<label>Assistance Type</label>
									<input type="text" id="dr_type" name="dr_type" class="form-control">
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
						<h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
							<label>Are you sure you want to delete that?</label>
						<?php $attributes = array('id' => 'DeleteModalForm'); echo form_open('admin/delete_dr_type', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="id" name="id"  value="">
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

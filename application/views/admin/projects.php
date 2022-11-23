
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

	  <div class="container-fluid">
		<div class="row">
          <div class="col-md-12">
				<div class="card">
					<div class="card-header">
					<h3 class="card-title" style="padding-top: 10px;">(Upcoming or Current) Projects</h3>
					<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Project</button>
					</div>
				</div>
			</div>
		</div>
	  </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="padding-top: 10px;">&nbsp;</h3>
				<!-- button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Request</button -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-borderless">
                  <thead class="border-bottom-0">
					<tr>
						<th></th>
						<th></th>
					</tr>
                  </thead>
                  <tbody>
					<?php $ctr = 0; $counter = 0; foreach($projects as $project){ $counter = $counter + 1; }?>

					<?php foreach($projects as $project){ ?>
					<?php if($ctr % 2 == 0){ echo "<tr>"; }?>
                    <td class="border-right border-left border-top border-bottom align-items-center text-center justify-content-center" style="margin-left: 50%; margin-right: 50%;">
						<h4><?php echo $project->project_title ?></h4> <br>
						<label>Date of Project: <?php echo $project->project_date; ?></label> <br>
						<img src="<?php echo base_url() ?>assets/files/projects/<?php echo $project->project_userfile;?>" style="width: 600px; height: 400px;" /> <br> <br>
						<p style="height: 100px;"><?php echo $project->project_details; ?></p> <br>
						
						<cite>
						    Posted by <?php foreach($users as $user){ if($user->user_id == $project->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?> 
							on <?php echo $project->date_created; ?> <?php if($project->archive == 1){ ?> (This post is Archived) <?php } ?>
						</cite> <br>

						

						<i id="project_title_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->project_title; ?></i>
						<i id="project_date_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->project_date; ?></i>
						<i id="project_details_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->project_details; ?></i>
						<i id="project_userfile_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->project_userfile; ?></i>
						<i id="user_id_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->user_id; ?></i>
						<i id="official_id_<?php echo $project->project_id;?>" style="display: none;"><?php echo $project->official_id; ?></i>
						
						<button class="btn btn-info text-justify text-center" data-toggle="modal" data-target="#EditModal"
						onclick="editFunc(<?php echo $project->project_id; ?>,'<?php echo $project->project_userfile; ?>')">
						Edit Post
						</button>
						<button class="btn btn-danger text-justify text-center" data-toggle="modal" data-target="#DeleteModal"
						onclick="delFunc(<?php echo $project->project_id; ?>)">
						Delete Post
						</button>
						<button class="btn btn-light text-justify text-center" data-toggle="modal" data-target="#ArchiveModal"
						onclick="archFunc(<?php echo $project->project_id; ?>)">
							<?php if($project->archive == 1){ ?> Undo Archive <?php } else { ?> Archive Post <?php } ?>
						</button>
						<br> <br>
					</td>
					<?php $ctr = $ctr + 1; ?>

				  <?php if(($ctr == $counter) && ($ctr % 2 == 1)){ ?> 
					<td class="border-right border-left border-top border-bottom align-items-center text-center justify-content-center" style="margin-left: 50%; margin-right: 50%;"></td>
				  <?php }?>

                  <?php if($ctr % 2 == 0){ echo "</tr>"; }?>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>

			  <script>
				function editFunc(id,uf)
				{

					var myDate = $('#project_date_' + id).html();
					//alert($('#project_date_' + id).html());
					var myArr = myDate.split(" ");

					//alert(myArr[0])

					$('#EditModal #id').val(id);
					$('#EditModal #project_title').val($('#project_title_' + id).html());
					$('#EditModal #project_date').val(myArr[0].trim());
					$('#EditModal #project_details').val($('#project_details_' + id).html());
					$('#EditModal #prev_project_userfile').val($('#project_userfile_' + id).html());
					$('#EditModal #official_id').val($('#official_id_' + id).html());
				}

				function delFunc(id)
				{
					$('#DeleteModal #id').val(id);
				}

				function archFunc(id)
				{
					$('#ArchiveModal #id').val(id);
					$('#ArchiveModalForm').submit();
				}

			  </script>

			  <!-- Add Modal -->
				<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/add_project'); ?>
						  <div class="form-row">
							<div class="col">
							  <label for="project_title">Title</label>
							  <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Project Title" required>
							</div>
							<div class="col">
							  <label for="project_date">Project Date</label>
							  <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="project_date" name="project_date" placeholder="When will it occur?">
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="project_details">Details</label>
							  <textarea type="text" class="form-control"  style="resize: none;" rows="10" cols="30"
							  id="project_details" name="project_details" placeholder="Details" required></textarea>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="project_file">Project Image</label>
							  <input type="file" accept="image/*" class="form-control form-control-file form-control-sm" style="padding-bottom: 35px;" 
							  id="project_userfile" name="project_userfile" placeholder="Project Image" required>
							</div>
							<div class="col">
							  <label for="official_id">Assign Project Lead</label>
							  <select name="official_id" class="form-control" required>
								<?php foreach($users as $user){ ?>
								<?php if($user->usertype == 2){ ?>
									<option value="<?php echo $user->user_id; ?>" ><?php echo $user->fname.' '.$user->mname.' '.$user->lname; ?></option>
								<?php } ?>
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

			  <!-- Edit Modal -->
				<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<?php echo form_open_multipart('admin/update_project'); ?>
						  <input type="hidden" id="id" name="id" value="">
						  <div class="form-row">
							<div class="col">
							  <label for="project_title">Title</label>
							  <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Project Title" required>
							</div>
							<div class="col">
							  <label for="project_date">Project Date</label>
							  <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="project_date" name="project_date" placeholder="When will it occur?" required>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="project_details">Details</label>
							  <textarea type="text" class="form-control"  style="resize: none;" rows="10" cols="30"
							  id="project_details" name="project_details" placeholder="Details" required></textarea>
							</div>
						  </div> <br>
						  <div class="form-row">
							<div class="col">
							  <label for="project_file">Project Image</label>
							  <input type="file" accept="image/*" class="form-control form-control-file form-control-sm" style="padding-bottom: 35px;" 
							  id="project_userfile" name="project_userfile" placeholder="Project Image">
							  <input type="hidden" id="prev_project_userfile" name="project_userfile" value="">
							</div>
							<div class="col">
							  <label for="official_id">Assign Project Lead</label>
							  <select name="official_id" id="official_id" class="form-control" required>
								<?php foreach($users as $user){ ?>
								<?php if($user->usertype == 2){ ?>
									<option value="<?php echo $user->user_id; ?>" ><?php echo $user->fname.' '.$user->mname.' '.$user->lname; ?></option>
								<?php } ?>
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Ayuda Receiver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'DeleteModalForm'); echo form_open('admin/delete_project', $attributes); ?>
							<div class="form-row">
							<input type="hidden" id="id" name="id"  value="">
								Are you sure you want to delete this project?
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

			  <!-- Archive Modal -->
				<div class="modal fade" id="ArchiveModal" tabindex="-1" role="dialog" aria-labelledby="ArchiveModal" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Ayuda Receiver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<?php $attributes = array('id' => 'ArchiveModalForm'); echo form_open('admin/archive_project', $attributes); ?>
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


          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

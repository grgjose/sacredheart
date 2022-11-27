
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">The Main Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">The Main Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section id="main_content" class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Document Requests</span>
                <span class="info-box-number">
                  <?php $ctr=0; foreach($requests as $request){ if($request->status == 0){$ctr = $ctr + 1;}} echo $ctr; ?>
                  <small>/</small>
				   <?php $ctr=0; foreach($requests as $request){ $ctr = $ctr + 1;} echo $ctr; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-angry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Complaints</span>
                <span class="info-box-number">
                  <?php $ctr=0; foreach($complaints as $complaint){ if($complaint->status == 0){$ctr = $ctr + 1;}} echo $ctr; ?>
                  <small>/</small>
				  <?php $ctr=0; foreach($complaints as $complaint){ $ctr = $ctr + 1;} echo $ctr; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hands-helping"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Assistance Requests</span>
                <span class="info-box-number">
                  <?php $ctr=0; foreach($assistance as $assist){ if($assist->status == 0){$ctr = $ctr + 1;}} echo $ctr; ?>
                  <small>/</small>
				  <?php $ctr=0; foreach($assistance as $assist){ $ctr = $ctr + 1;} echo $ctr; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                  <?php $ctr=0; foreach($users as $user){ $ctr = $ctr + 1;} echo $ctr; ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- CHART: All Services -->
			<div class="card" style="height: 650px;">
              <div class="card-header">
                <h3 class="card-title">Services Usage</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart-responsive">
						<div class="chartjs-size-monitor">
							
							<div class="chartjs-size-monitor-expand">
								<div class=""></div>
							</div>
							<div class="chartjs-size-monitor-shrink">
								<div class="">
								</div>
							</div>
						</div>
						<canvas id="pieChart" height="63" width="127" style="display: block; width: 167px; height: 83px;" class="chartjs-render-monitor"></canvas>
						<?php $total=0; ?>
						<?php foreach($requests as $request){ $total = $total + 1;}?>
						<?php foreach($complaints as $complaint){ $total = $total + 1;}?>
						<?php foreach($assistance as $assist){ $total = $total + 1;}?>
						<br><h5 class="justify-content-center text-center">Total: &nbsp; <?php echo $total; ?></h5> 
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle" style="color:#3498db;"></i> Document Requests</li>
                      <li><i class="far fa-circle" style="color:#e74c3c;"></i> Complaints</li>
                      <li><i class="far fa-circle" style="color:#00bc8c;"></i> Assistance Requests</li>
                    </ul>
                  </div>  -->
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-dark p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: white;">
                     Document Requests
                      <span class="float-right" style="color: #3498db;">
						<?php $total=0; foreach($requests as $request){ $total = $total + 1;} if($total==0){$total = 1;}?>
						<?php $current=0; foreach($requests as $request){ if($request->status == 0){$current = $current + 1;}} ?>
						<?php $dir = "up"; if(round($current/$total*100, 2) < 30){ $dir = "down"; } elseif (round($current/$total*100, 2) < 60){$dir = "left"; }?>
                        <i class="fas fa-arrow-<?php echo $dir; ?> text-sm"></i> &nbsp; &nbsp;
						<?php echo round($current/$total*100, 2); ?>% Completed
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: white;">
                      Complaints
                      <span class="float-right" style="color: #e74c3c;">
					  	<?php $total=0; foreach($complaints as $complaint){ $total = $total + 1;} if($total==0){$total = 1;}?>
						<?php $current=0; foreach($complaints as $complaint){ if($complaint->status == 0){$current = $current + 1;}} ?>
						<?php $dir = "up"; if(round($current/$total*100, 2) < 30){ $dir = "down"; } elseif (round($current/$total*100, 2) < 60){$dir = "left"; }?>
                        <i class="fas fa-arrow-<?php echo $dir; ?> text-sm"></i> &nbsp; &nbsp;
						<?php echo round($current/$total*100, 2); ?>% Completed
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: white;">
                      Assistance Requests
                      <span class="float-right" style="color: #00bc8c;">
						<?php $total=0; foreach($assistance as $assist){ $total = $total + 1;} if($total==0){$total = 1;}?>
						<?php $current=0; foreach($assistance as $assist){ if($assist->status == 0){$current = $current + 1;}} ?>
						<?php $dir = "up"; if(round($current/$total*100, 2) < 30){ $dir = "down"; } elseif (round($current/$total*100, 2) < 60){$dir = "left"; }?>
                        <i class="fas fa-arrow-<?php echo $dir; ?> text-sm"></i> &nbsp; &nbsp;
						<?php echo round($current/$total*100, 2); ?>% Completed
                      </span>
                    </a>
                  </li>
                </ul>
              </div> 
              <!-- /.footer -->
            </div>
		  </div>
          <div class="col-md-6">
		    <!-- TABLE: Latest Complaints -->
            <div class="card" style="height: 650px;">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Complaints</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Description</th>
                      <th>Letter File Link</th>
                      <th>Status</th>
                      <th>Complaintant</th>
					  <th>Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $ctr=0; foreach($complaints as $complaint){ ?>
                    <tr>
                      <td><?php echo $complaint->complaint_id; ?></td>
                      <td><?php echo $complaint->complaint_description; ?></td>
					  <td><a href="<?php echo base_url() ?>assets/files/<?php echo $complaint->complaint_letter; ?>"><?php echo $complaint->complaint_letter; ?></a></td>
                      <td>
					    <?php if($complaint->status == 1){?> <span class="badge badge-success">Done</span> <?php }?>
						<?php if($complaint->status == 0){?> <span class="badge badge-danger">Pending</span> <?php }?>
					  </td>
					  <td><?php foreach($users as $user){ if($user->user_id == $complaint->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?></td>
					  <td><?php echo $complaint->date_created; ?></td>
                    </tr>
                    <?php $ctr = $ctr + 1; if($ctr==6){ break; }  } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

                <a href="<?php echo base_url(); ?>admin/filed_complaints" class="btn btn-sm btn-secondary float-right">View All Complaints</a>
              </div>
              <!-- /.card-footer -->
            </div>
		  </div>
          <div class="col-md-6">
			<!-- TABLE: Latest Document Requests-->
            <div class="card" style="height: 650px;">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Document Requests</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
					  <th>Document Type</th>
                      <th>Purpose</th>
                      <th>Date Needed</th>
                      <th>Status</th>
                      <th>Complaintant</th>
					  <th>Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $ctr=0; foreach($requests as $request){ ?>
                    <tr>
                      <td><?php echo $request->request_id; ?></td>
					  <td><?php foreach($request_types as $type){ if($request->document_type == $type->request_type_id){ echo $type->request_type; break; }} ?></td>
                      <td><?php echo $request->document_purpose; ?></td>
					  <td><?php echo $request->date_needed; ?></td>
                      <td>
					    <?php if($request->status == 1){?> <span class="badge badge-success">Done</span> <?php }?>
						<?php if($request->status == 0){?> <span class="badge badge-danger">Pending</span> <?php }?>
					  </td>
					  <td><?php foreach($users as $user){ if($user->user_id == $request->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?></td>
					  <td><?php echo $request->date_created; ?></td>
                    </tr>
                    <?php $ctr = $ctr + 1; if($ctr==6){ break; }  } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

                <a href="<?php echo base_url(); ?>admin/document_requests" class="btn btn-sm btn-secondary float-right">View All Document Requests</a>
              </div>
              <!-- /.card-footer -->
            </div>
		  </div>
          <div class="col-md-6">
			<!-- TABLE: Latest Assistance Requests-->
            <div class="card" style="height: 650px;">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Assistance Requests</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
					  <th>Assistance Type</th>
                      <th>Purpose</th>
                      <th>Date Needed</th>
                      <th>Status</th>
                      <th>Complaintant</th>
					  <th>Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $ctr=0; foreach($assistance as $assist){ ?>
                    <tr>
                      <td><?php echo $assist->assistance_id; ?></td>
					  <td><?php foreach($assistance_types as $type){ if($assist->assistance_type == $type->assistance_type_id){ echo $type->assistance_type; break; }} ?></td>
                      <td><?php echo $assist->assistance_purpose; ?></td>
					  <td><?php echo $assist->date_needed; ?></td>
                      <td>
					    <?php if($assist->status == 1){?> <span class="badge badge-success">Done</span> <?php }?>
						<?php if($assist->status == 0){?> <span class="badge badge-danger">Pending</span> <?php }?>
					  </td>
					  <td><?php foreach($users as $user){ if($user->user_id == $assist->user_id){ echo $user->fname." ".$user->mname." ".$user->lname; break; } } ?></td>
					  <td><?php echo $assist->date_created; ?></td>
                    </tr>
                    <?php $ctr = $ctr + 1; if($ctr==6){ break; }  } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

                <a href="<?php echo base_url(); ?>admin/assistance_requests" class="btn btn-sm btn-secondary float-right">View All Assistance Requests</a>
              </div>
              <!-- /.card-footer -->
            </div>
		  </div>
           <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

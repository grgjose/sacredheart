
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="position: fixed; margin-top: 60px; width: 85%; z-index:1; background-color: white;">
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

	  		    <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="padding-top: 10px;">(Upcoming or Current) Projects</h3>
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#AddModal">Add Project</button>
              </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">

			  <!-- The time line -->
            <div class="timeline" style="margin-top: 200px;">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">3 Jan. 2014</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                  <h3 class="timeline-header"><a href="#">Admin</a> posted a project</h3>

                  <div class="timeline-body">
                    <!-- div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
					  
                    </div -->
					<img src="<?php echo base_url() ?>assets/images/feature/event_01.jpg" width="75%" height="75%" />
					<h3 style="width: 75%; margin-left: 10px;">Street Mass will Start this December</h3>
					<p style="width: 75%; margin-left: 10px;">
					Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
					</p>
                  </div>
                  <div class="timeline-footer" style="margin-left: 10px;">
                    <a class="btn btn-primary btn-sm">Edit Post</a>
                    <a class="btn btn-danger btn-sm">Delete Post</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
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


  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 UST Students.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard2.js"></script>
<!-- Notyf Plugin -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //$("#example1").DataTable({
    //  "responsive": true, "lengthChange": false, "autoWidth": false,
    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');;
	
	$('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
	  "lengthMenu": [3],
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
	  
    });

  });

	// Select the target node.
	var target = document.querySelector('tbody')

	// Create an observer instance.
	var observer = new MutationObserver(function(mutations) {
		$('#example2_length').attr('style', 'color: white; padding-right: 20px;');
		$('#example2_filter').attr('style', 'color: white;'); 
		$('#example2_info').attr('style', 'color: white;');
		$('#example2_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 
	});

	var observer2 = new MutationObserver(function(mutations) {
		$('#example3_length').attr('style', 'color: white; padding-right: 20px;');
		$('#example3_filter').attr('style', 'color: white;'); 
		$('#example3_info').attr('style', 'color: white;');
		$('#example3_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 
	});

	// Pass in the target node, as well as the observer options.
	observer.observe(target, {
		attributes:    true,
		childList:     true,
		characterData: true
	});

	observer2.observe(target, {
		attributes:    true,
		childList:     true,
		characterData: true
	});

  	// Create an instance of Notyf
	var notyf = new Notyf();

	// Display an error notification
	var iserror = "<?php if($error!=""){ echo $error; } ?>";
	
	if(iserror != ""){
		notyf.error(iserror);
	}
	
	// Display an success notification
	var issuccess = "<?php if($success!=""){ echo $success; } ?>";
	
	if(issuccess != ""){
		notyf.success(issuccess);
	}
</script>
<script>
  
//-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: [
      'Document Requests',
      'Complaints',
      'Assistance Requests',
    ],
    datasets: [
      {
        data: [<?php $ctr=0; foreach($requests as $request){ $ctr = $ctr + 1;} echo $ctr; ?>, 
		       <?php $ctr=0; foreach($complaints as $complaint){ $ctr = $ctr + 1;} echo $ctr; ?>, 
			   <?php $ctr=0; foreach($assistance as $assist){ $ctr = $ctr + 1;} echo $ctr; ?>],
        backgroundColor: ['#3498db','#e74c3c','#00bc8c',]
      }
    ]
  }

  var pieOptions = {
    maintainAspectRatio : true,
    responsive : true,
    legend: {
      display: true,
	  position: 'bottom',
	  labels: {
		fontColor: '#FFFFFF',
		padding: 30,
		boxWidth: 80,
		fontFamily: 'Helvetica',
		usePointStyle: true
	  }
    }
	
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
  })

</script>
</body>
</html>

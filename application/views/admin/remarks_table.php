
<table id="example4" class="table table-bordered table-hover">
    <thead>
    <tr>
		<th>User</th>
		<th>Status</th>
		<th>Remarks</th>
		<th>Date Created</th>
    </tr>
    </thead>
		<tbody>
		<?php $prev_status = 2; foreach($remarks as $remark){ ?>
			<tr>
				<td><?php echo $remark->user_id; ?></td>
				<td>
					<?php if($remark->status == 1){?> <span class="badge badge-success"><?php if($prev_status == 0){ echo "Changed to "; }?>Done</span> <?php }?>
					<?php if($remark->status == 0){?> <span class="badge badge-danger"><?php if($prev_status == 1){ echo "Changed to "; }?>Pending</span> <?php }?>
					<?php $prev_status = $remark->status; ?>
				</td>
				<td><?php echo $remark->remark; ?></td>
				<td><?php echo $remark->date_created; ?></td>
			</tr>
		<?php } ?>
    </tfoot>
</table>

<script>
	$('#example4').ready(function() {
   
		$('#example4').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true
		});
	
		$('#example4_length').attr('style', 'color: white; padding-right: 20px;');
		$('#example4_filter').attr('style', 'color: white;'); 
		$('#example4_info').attr('style', 'color: white;');
		$('#example4_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 

	});

	$(document).ready(function(){

			// Select the target node.
			var target = document.querySelector('#example4');

			// Create an observer instance.
			var observer = new MutationObserver(function(mutations) {
				$('#example4_length').attr('style', 'color: white; padding-right: 20px;');
				$('#example4_filter').attr('style', 'color: white;'); 
				$('#example4_info').attr('style', 'color: white;');
				$('#example4_paginate li').attr('style', 'padding: 0; margin: 0; color: white;'); 
			});

			// Pass in the target node, as well as the observer options.
			observer.observe(target, {
				attributes:    true,
				childList:     true,
				characterData: true
			});

		});

</script>

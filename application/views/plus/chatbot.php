<?php $ctr = 1; $records = explode(',',$chatbot_replies); ?>

<?php foreach($records as $record){ ?>
<?php foreach($replies as $reply){ ?>
<?php if($reply->reply_id == intval($record)){ ?>
			

<?php if($reply->reply_from == 1){ ?>

<div class="chatbox__body__message chatbox__body__message--left">

<img src="<?php echo base_url(); ?>assets/files/info/chatbot.jpg" alt="Chatbot Pic">
												
<div class="ul_section_full">
	<ul class="ul_msg">
		<li style="font-size: 13px; color: #010101;"><?php echo $reply->reply; ?></li>
	</ul>
</div>
</div>

<?php if(count($records) == $ctr){ ?>
<div class="chatbox__body__message chatbox__body__message--right">
	<img src="<?php echo base_url(); ?>assets/files/users/default.jpg" alt="Chatbot Pic">

	<?php $suggests = explode(',',$reply->reply_suggested);?>

	<div class="ul_section_full">
		<ul class="ul_msg">
			<li style="font-size: 13px; color: #010101;">Click your reply...</li>

			<?php foreach($suggests as $suggest){ ?>
			<?php foreach($replies as $reply){ ?>
			<?php if($reply->reply_id == intval($suggest)){ ?>
				<li style="font-size: 13px; color: #010101;">
					<i class="ti-angle-double-right">&nbsp; &nbsp;</i>
					<a href="#" onclick="set_reply(<?php echo $reply->reply_id; ?>)"><?php echo $reply->reply; ?></a>
				</li>
			<?php break; } ?>
			<?php } ?>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>

<?php } else { ?>

<div class="chatbox__body__message chatbox__body__message--right">
<img src="<?php echo base_url(); ?>assets/files/users/default.jpg" alt="Chatbot Pic">

<div class="ul_section_full">
	<ul class="ul_msg">
		<li style="font-size: 13px; color: #010101;"><?php echo $reply->reply; ?></li>
	</ul>
</div>
</div>
<?php }?>

<?php break; }   ?>
<?php } $ctr = $ctr + 1; ?>
<?php } ?>

						






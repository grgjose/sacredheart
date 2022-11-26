

<!-- 

********************************
*           EDIT INFO          *
******************************** 

-->

<div  style="background-color: gray; height: 5px; width: 100%;"></div>

<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Content -->
					<div class="content text-center">
						<div class="logo">
							<label>User ID (System Generated)</label> <br>
							<label> 13468782 </label> <br> <br>
							<a href="#">
								<img src="<?php echo base_url() ?>assets/files/users/<?php if($profile['userfile'] != ""){ echo $profile['userfile']; } else {echo "default.jpg";}; ?>" 
								alt="" style="width:100px; height: 100px;">
							</a> <br> 
							<a href="#" data-toggle="modal" data-target="#EditProfilePic" onclick="editProfilePic(<?php echo $profile['user_id']; ?>)"> Edit Profile Picture </a>
							<script>
								function editProfilePic(id){
									$("#EditProfilePic #id").val(id);
								}
							</script>
						</div>
						<div class="title-text">
							<h3>Edit your Information</h3>
						</div>
						
							<?php echo form_open('home/update_info');?>
							<!-- First Name -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">First Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
								    <input type="hidden" id="type" name="type" value="fname">
									<input type="text" class="form-control main" id="fname" name="fname" value="<?php echo $profile['fname']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['fname']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>

							<!-- Middle Name -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Middle Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
								    <input type="hidden" id="type" name="type" value="mname">
									<input type="text" class="form-control main" id="mname"  name="mname"  value="<?php echo $profile['mname']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['mname']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>

							<!-- Last Name -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Last Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
								    <input type="hidden" id="type" name="type" value="lname">
									<input type="text" class="form-control main" id="lname" name="lname" value="<?php echo $profile['lname']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['lname']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>

							<!-- Email -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Email:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
								    <input type="hidden" id="type" name="type" value="email">
									<input type="email" class="form-control main" id="email" name="email" value="<?php echo $profile['email']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['email']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>


							<!-- Password -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Password:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="hidden" id="type" name="type" value="password">
									<input type="password" class="form-control main" id="password" name="password" value="<?php echo $profile['password']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['password']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>
							
							<!-- Address -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Complete Address:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="hidden" id="type" name="type" value="address">
									<input type="text" class="form-control main" id="address" name="address" value="<?php echo $profile['address']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['address']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>


							<!-- Contact -->
							<?php echo form_open('home/update_info');?>
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Contact:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="hidden" id="type" name="type" value="contact">
									<input type="text" class="form-control main" id="contact" name="contact" value="<?php echo $profile['contact']; ?>" required>
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['contact']; ?>_btn" type="submit" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							<?php echo form_close();?>

							<br>

						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="EditProfilePic" tabindex="-1" role="dialog" aria-labelledby="EditProfilePic" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Profile Picture</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<?php $attributes = array('id' => 'EditModalForm'); echo form_open_multipart('home/edit_profile_picture', $attributes); ?>
			<div class="form-row">
				<input type="hidden" id="id" name="id"  value="">
				<div class="col">
					<label>Profile Picture</label>
					<input type="file" accept="image/*" name="userfile" class="form-control form-control-file" style="padding-bottom: 35px;" required>
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

<script>

    $(".alpha-only").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
 
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z.\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            alert("Invalid Character!");
        }
 
        return isValid;
    });

    $(".alpha-num-only").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
 
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z0-9.,\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            alert("Invalid Character!");
        }
 
        return isValid;
    });

	$(".numberic-only").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
 
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9+\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            alert("Invalid Character!");
        }
 
        return isValid;
    });

	$("#c_password").change(function() {

        if($("#m_password").val() != $("#c_password").val())
		{
			$("#m_password").val("");
			$("#c_password").val("");
			var notyf = new Notyf();
			notyf.error("Passwords do not match");
			$("#m_password").focus();
		}
    });


</script>

<!--====  End of Sign Up  ====-->


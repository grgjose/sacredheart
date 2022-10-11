

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
							<a href="index.html"><img src="<?php echo base_url() ?>assets/images/logo.png" alt=""></a> <br> 
							<a href="#"> Edit Profile Picture </a>
						</div>
						<div class="title-text">
							<h3>Edit your Information</h3>
						</div>
						<?php echo form_open('home/update_user');?>

							<!-- First Name -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">First Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="text" class="form-control main" id="fname" value="<?php echo $profile['fname']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['fname']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<!-- Middle Name -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Middle Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="text" class="form-control main" id="mname" value="<?php echo $profile['mname']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['mname']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<!-- Last Name -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Last Name:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="text" class="form-control main" id="lname" value="<?php echo $profile['lname']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['lname']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<!-- Email -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Email:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="email" class="form-control main" id="email" value="<?php echo $profile['email']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['email']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<!-- Password -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Password:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="password" class="form-control main" id="password" value="<?php echo $profile['password']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['password']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>
							
							<!-- Address -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Complete Address:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="text" class="form-control main" id="address" value="<?php echo $profile['address']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['address']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<!-- Contact -->
							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<label type="text" readonly class="form-control-plaintext">Contact:</label>
								</div>
								<div class="col-lg-9 col-sm-12">
									<input type="text" class="form-control main" id="contact" value="<?php echo $profile['contact']; ?>">
								</div>
								<div class="col-lg-1 col-sm-12">
									<button id="<?php echo $profile['contact']; ?>_btn" type="button" class="btn btn-outline-info btn-lg col-sm-12"><i class="ti-write"></i></button>
								</div>
							</div>

							<br>

						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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




<!--=============================
=            Sign Up            =
==============================-->

<div  style="background-color: gray; height: 5px; width: 100%;"></div>

<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image align-self-center"><img class="img-fluid" src="<?php echo base_url() ?>assets/images/Login/sign-up.jpg" alt="desk-image">
					</div>
					<!-- Content -->
					<div class="content text-center">
						<div class="logo">
							<a href="index.html"><img src="<?php echo base_url() ?>assets/images/logo.png" alt=""></a>
						</div>
						<div class="title-text">
							<h3>Sign Up for New Account</h3>
						</div>
						<?php echo form_open_multipart('home/register_user');?>
							<!-- Username -->
							<input class="form-control main alpha-only" id="fname" name="fname" type="text" placeholder="First Name" required>
							<!-- Username -->
							<input class="form-control main alpha-only" id="mname" name="mname" type="text" placeholder="Middle Name (Optional)">
							<!-- Username -->
							<input class="form-control main alpha-only" id="lname" name="lname" type="text" placeholder="Last Name" required>
							<!-- Email -->
							<input class="form-control main" id="email" name="email" type="email" placeholder="Email Address" required>
							<!-- Password -->
							<input class="form-control main" id="m_password" name="password" type="password" placeholder="Password" required>
							<!-- Password -->
							<input class="form-control main" id="c_password" name="c_password" type="Password" placeholder="Confirm Password" required>
							<!-- Password -->
							<input class="form-control main alpha-num-only" id="address" name="address" type="text" placeholder="Complete Address" required>
							<!-- Password -->
							<input class="form-control main numberic-only" id="contact" name="contact" type="text" placeholder="Contact #" required>
							<!-- Password -->
							<label class="form-label">Any ID with Address</label>
							<input class="form-control form-control-sm" id="userfile" name="userfile" type="file" style="height: 40px;" size="100000" required>
							<br>
							<!-- Submit Button -->
							<input id="submit" type="submit" class="btn btn-main-sm" value="Sign Up">
						<?php echo form_close();?>
						<div class="new-acount">
							<p>By clicking “Sign Up” I agree to <a href="privacy-policy.html">Terms of Conditions.</a></p>
							<p>Anready have an account? <a href="#" data-target="#LoginModal" data-toggle="modal">SIGN IN</a></p>
						</div>
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

	$("#m_password").change(function() {

		if($("#c_password").val() == "")
		{

		}
        else if($("#m_password").val() != $("#c_password").val())
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


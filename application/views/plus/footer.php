
<!--============================
=            Footer            =
=============================-->
<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
          <div class="block">
            <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="footer-logo"></a>
            <!-- Social Site Icons -->
            <ul class="social-icon list-inline">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/themefisher"><i class="ti-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://twitter.com/themefisher"><i class="ti-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/themefisher/"><i class="ti-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Product</h6>
            <!-- links -->
            <ul>
              <li><a href="team.html">Teams</a></li>
              <li><a href="blog.html">Blogs</a></li>
              <li><a href="FAQ.html">FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Resources</h6>
            <!-- links -->
            <ul>
              <li><a href="sign-up.html">Singup</a></li>
              <li><a href="sign-in.html">Login</a></li>
              <li><a href="blog.html">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="career.html">Career</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Investor</a></li>
              <li><a href="privacy.html">Terms</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="privacy-policy.html">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center bg-dark py-4">
    <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by UST - IT Students </small class="text-secondary">
  </div>
</footer>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>
  
  <!-- JAVASCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/slick/slick.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/syotimer/jquery.syotimer.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/aos/aos.js"></script>

  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/google-map/gmap.js"></script>

  <!-- Notyf Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>



  <script src="js/script.js"></script>

  
</body>

<script>

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

</html>

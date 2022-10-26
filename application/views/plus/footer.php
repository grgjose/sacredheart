
		<!-- ChatBot Section -->
		<div class="row">
			<div class="chatbox chatbox22 chatbox--tray">
				
				<!-- Chat Tab -->
				<div class="chatbox__title">
					<h6><a href="javascript:void()"> Chatbot Helper <span class="ti-comments-smiley"></span> </a></h6>

					<!-- button class="chatbox__title__close">
						<span>
							<svg viewBox="0 0 12 12" width="12px" height="12px">
								<line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
								<line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
							</svg>
						</span>
					</button -->
				</div>

				<!-- Chat Tab Content (Responsive) -->
				<div class="chatbox__body">

					<div class="chatbox__body__message chatbox__body__message--left">
						<img src="<?php echo base_url(); ?>assets/files/users/pat.jpg" alt="Chatbot Pic">
												
						<div class="ul_section_full">
							<ul class="ul_msg">
								<li><strong>Chat Pat</strong></li>
								<li>How can I help you?</li>
							</ul>

						</div>
					</div>

					<div class="chatbox__body__message chatbox__body__message--right">
						<!--img src="<?php echo base_url(); ?>assets/files/users/2x2.jpg" alt="Chatbot Pic" -->

						<div class="ul_section_full">
							<ul class="ul_msg">
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
							</ul>
						</div>
					</div>

				</div>

				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" type="text" class="form-control input-sm chat_set_height" placeholder="Type your message here..." 
						tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" contenteditable="true" />
							<span class="input-group-btn">
								<button class="btn bt_bg btn-sm" id="btn-chat">
									Send</button>
							</span>
					</div>
				</div>
			</div>
		</div>

		<!-- ChatBot CSS -->
		<style>

			.chatbox {
				position: fixed;
				bottom: 0;
				right: 30px;
				width: 300px;
				height: 400px;
				background-color: #fff;
				font-family: 'Lato', sans-serif;

				-webkit-transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);
				transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);
				z-index: 999;
				display: -webkit-flex;
				display: flex;

				-webkit-flex-direction: column;
				flex-direction: column;
			}

			.chatbox--tray {
				bottom: -350px;
			}

			.chatbox--closed {
				bottom: -400px;
			}

			.chatbox .form-control:focus {
				border-color: #1f2836;
			}

			.chatbox__title,
			.chatbox__body {
				border-bottom: none;
			}

			.chatbox__title {
				min-height: 50px;
				padding-right: 10px;
				background-color: #1f2836cc;
				border-top-left-radius: 4px;
				border-top-right-radius: 4px;
				cursor: pointer;

				display: -webkit-flex;
				display: flex;

				-webkit-align-items: center;
				align-items: center;
			}

			.chatbox__title h6 {
				height: 50px;
				margin: 0 0 0 15px;
				line-height: 50px;
				position: relative;
				padding-left: 20px;

				-webkit-flex-grow: 1;
				flex-grow: 1;
			}

			.chatbox__title h6 a {
				color: #fff;
				max-width: 195px;
				display: inline-block;
				text-decoration: none;
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
			}

			.chatbox__title h6:before {
				content: '';
				display: block;
				position: absolute;
				top: 50%;
				left: 0;
				width: 12px;
				height: 12px;
				background: #4CAF50;
				border-radius: 6px;

				-webkit-transform: translateY(-50%);
				transform: translateY(-50%);
			}

			.chatbox__title__tray,
			.chatbox__title__close {
				width: 24px;
				height: 24px;
				outline: 0;
				border: none;
				background-color: transparent;
				opacity: 0.5;
				cursor: pointer;

				-webkit-transition: opacity 200ms;
				transition: opacity 200ms;
			}

			.chatbox__title__tray:hover,
			.chatbox__title__close:hover {
				opacity: 1;
			}

			.chatbox__title__tray span {
				width: 12px;
				height: 12px;
				display: inline-block;
				border-bottom: 2px solid #fff
			}

			.chatbox__title__close svg {
				vertical-align: middle;
				stroke-linecap: round;
				stroke-linejoin: round;
				stroke-width: 1.2px;
			}

			.chatbox__body,
			.chatbox__credentials {
				padding: 15px;
				border-top: 0;
				background-color:#DCDCDC;
				border-left: 1px solid #ddd;
				border-right: 1px solid #ddd;

				-webkit-flex-grow: 1;
				flex-grow: 1;
			}

			.chatbox__credentials {
				display: none;
			}

			.chatbox__credentials .form-control {
				-webkit-box-shadow: none;
				box-shadow: none;
			}

			.chatbox__body {
				overflow-y: auto;
			}

			.chatbox__body__message {
				position: relative;
			}

			.chatbox__body__message p {
				padding: 15px;
				border-radius: 4px;
				font-size: 14px;
				background-color: #fff;
				-webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
				box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
			}

			.chatbox__body__message img {
				width: 40px;
				height: 40px;
				border-radius: 50%;
				border: 2px solid #fcfcfc;
				position: absolute;
				top: 15px;
			}

			.chatbox__body__message--left p {
				margin-left: 15px;
				padding-left: 30px;
				text-align: left;padding-top: 25px;
			}

			.chatbox__body__message--left img {
				left: -5px;
			}

			.chatbox__body__message--right p {
				margin-right: 15px;
				padding-right: 30px;
				text-align: right;
			}

			.chatbox__body__message--right img {
				right: -5px;
			}

			.chatbox__message {
				padding: 15px;
				min-height: 50px;
				outline: 0;
				resize: none;
				border: none;
				font-size: 12px;
				border: 1px solid #ddd;
				border-bottom: none;
				background-color: #fefefe;
			}

			.chatbox--empty {
				height: 262px;
			}

			.chatbox--empty.chatbox--tray {
				bottom: -212px;
			}

			.chatbox--empty.chatbox--closed {
				bottom: -262px;
			}

			.chatbox--empty .chatbox__body,
			.chatbox--empty .chatbox__message {
				display: none;
			}

			.chatbox--empty .chatbox__credentials {
				display: block;
			}

			.chatbox_timing {
				position: absolute;
				right: 10px;
				font-size: 12px;
				top: 2px;
			}

			.chatbox_timing ul{padding:0;margin:0}
			.chatbox_timing ul li {
				list-style: none;
				display: inline-block;
				margin-left: 3px;
				margin-right: 3px;
			}

			.chatbox_timing ul li a{display:block;color:#747474}
			.ul_msg {
				padding: 10px !important;
			}

			.chatbox__body__message--right .ul_section_full{
				margin-right: 15px;
				padding-right: 30px;
				text-align: right;
				border-radius: 4px;
				font-size: 14px;
				background-color: #fff;
				-webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
				box-shadow: 1px 1px rgba(100, 100, 100, 0.1); 
				margin-bottom: 15px;
				padding-bottom: 5px; 
				padding-top:15px;
			}

			.chatbox__body__message--left .ul_section_full {
				margin-left: 15px;
				padding-left: 15px;
				text-align: left;
				padding-top: 15px;
				padding-bottom: 5px;
				margin-bottom: 15px;
				border-radius: 4px;
				font-size: 14px;
				background-color: #fff;
				-webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
				box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
			}

			.ul_msg{padding:0;margin:0px}
			.ul_msg li{list-style:none;display:block}
			.ul_msg2{padding:0;margin:0px;text-align: right;}
			.ul_msg2 li{list-style:none;display:inline-block;margin-right: 15px;}
			.chatbox__body__message--right .chatbox_timing  {
				position: absolute;
				left: 10px;
				font-size: 12px;
				top: 2px;
			}

			.chatbox__body__message--right .ul_msg2{text-align:left}
			.chatbox__body__message--right .ul_msg2 li {
				list-style: none;
				display: inline-block;
				margin-left: 15px;margin-right:0px
			}

			.chat_set_height {
				height: 40px;
				margin-top: 1px;
			}

			.chatbox22 .form-control:focus {
				border-color: #DCDCDC;
			}

			.width50{width:50%;float:left;background:#ECECEC;}


			/* For Message*/
			.message_check{
				padding-top:10px;
			}

			.messsade_date {
				text-align: left;
				padding-top: 9px;
			}

			.messsade_date a{
				color:#000;
			}

			.padleftright0{
				padding-left:0px;
				padding-right:0px;
			}

			.message_box_area {
				color: #000;
				cursor: pointer;
			}

			.create_m {
				border: 1px solid #ccc !important;
			}

			.fileinput-button {
				float: left;
				margin-right: 4px;
				overflow: hidden;
				position: relative;
			}

			.fileinput-button {
				background: none repeat scroll 0 0 #eeeeee;
				border: 1px solid #e6e6e6;
				margin-top: 15px;
			}

			.fileinput-button {
				float: left;
				margin-right: 4px;
				overflow: hidden;
				position: relative;
			}

			.fileinput-button input {
				cursor: pointer;
				direction: ltr;
				font-size: 23px;
				margin: 0;
				opacity: 0;
				position: absolute;
				right: 0;
				top: 0;
				transform: translate(-300px, 0px) scale(4);
			}

			.fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
				margin-bottom: 5px;
			}

			.create_m:focus {
				border-color: #66afe9 !important;
				outline: 0 !important;
				-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6) !important;
				box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6) !important;
			}

			.col-lg-3.control-label {
				text-align: left;
			}
		</style>

		<!-- ChatBot Javascript -->
		<script>
			(function($) {
				$(document).ready(function() {
					var $chatbox = $('.chatbox'),
						$chatboxTitle = $('.chatbox__title'),
						$chatboxTitleClose = $('.chatbox__title__close'),
						$chatboxCredentials = $('.chatbox__credentials');

					$chatboxTitle.on('click', function() {
						$chatbox.toggleClass('chatbox--tray');
					});
					$chatboxTitleClose.on('click', function(e) {
						e.stopPropagation();
						$chatbox.addClass('chatbox--closed');
					});
					$chatbox.on('transitionend', function() {
						if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
					});
        
				});
			})(jQuery);
		</script>

		<!-- Footer Section -->

	<footer>
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 m-md-auto align-self-center">
						<div class="block">
							<a style="margin-left: 20px;" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="footer-logo"></a>
				<!-- Social Site Icons -->
				<ul class="social-icon list-inline">
				  <li class="list-inline-item">
					<a href="https://www.facebook.com/OfficialBarangaySacredHeart"><i class="ti-facebook"></i></a>
				  </li>
				  <li class="list-inline-item">
					<a href="https://twitter.com/SKSacre?s=20&t=t487gkarG01J8WI9W8VbkA"><i class="ti-twitter"></i></a>
				  </li>
				  <li class="list-inline-item">
					<a href="https://www.instagram.com/ilostcountph/"><i class="ti-instagram"></i></a>
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
				  <li><a href="<?php echo base_url(); ?>home/contacts">Teams</a></li>
				  <li><a href="<?php echo base_url(); ?>home/about">Blogs</a></li>
				  <li><a href="<?php echo base_url(); ?>home/contacts">FAQs</a></li>
				</ul>
			  </div>
			</div>
			<div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
			  <div class="block-2">
				<!-- heading -->
				<h6>Company</h6>
				<!-- links -->
				<ul>
				  <li><a href="<?php echo base_url(); ?>home/about">About</a></li>
				  <li><a href="<?php echo base_url(); ?>home/contacts">Contact</a></li>
				  <li><a href="<?php echo base_url(); ?>home/contacts">Team</a></li>
				  <li><a href="#" data-target="#TermsModal" data-toggle="modal">Privacy Policy</a></li>
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

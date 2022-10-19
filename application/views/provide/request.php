
<!-- ********************************
     *             INTRO            *
	 ******************************** -->
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>List of Residents</h1>
				<!-- Page Description -->
				<p>Our Barangay here in Quezon City, adheres to provide the best service possible for our residents. We want to give top priority on our residents' 
				wellness and health. In order to do that, We provide many available options for their convenience.</p>

				<br>
				<div class="form-group pull-right">
					<input type="text" class="search form-control" placeholder="What you looking for?">
				</div>
				<span class="counter pull-right"></span>
				<table class="table table-hover table-bordered results">
				  <thead>
					<tr>
					  <th>#</th>
					  <th class="col-md-5 col-xs-5">Name / Surname</th>
					  <th class="col-md-4 col-xs-4">Job</th>
					  <th class="col-md-3 col-xs-3">City</th>
					</tr>
					<tr class="warning no-result">
					  <td colspan="4"><i class="fa fa-warning"></i> No result</td>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td>George Louis Jose</td>
					  <td>UI & UX</td>
					  <td>Mars</td>
					</tr>
					<tr>
					  <th scope="row">2</th>
					  <td>Kendrick Lamar</td>
					  <td>Software Developer</td>
					  <td>Japan</td>
					</tr>
					<tr>
					  <th scope="row">3</th>
					  <td>Patrick Star</td>
					  <td>Purchasing</td>
					  <td>China</td>
					</tr>
					<tr>
					  <th scope="row">4</th>
					  <td>Michael the Great</td>
					  <td>Sales</td>
					  <td>Philippines</td>
					</tr>
				  </tbody>
				</table>
				<style>

				.results tr[visible='false'],
				.no-result{
				  display:none;
				}

				.results tr[visible='true']{
				  display:table-row;
				}

				.counter{
				  padding:8px; 
				  color:#ccc;
				}
				</style>
				<script>
				$(document).ready(function() {
					$(".search").keyup(function () {
					var searchTerm = $(".search").val();
					var listItem = $('.results tbody').children('tr');
					var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
				  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
						return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
					}
				  });
    
				  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','false');
				  });

				  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','true');
				  });

				  var jobCount = $('.results tbody tr[visible="true"]').length;
					$('.counter').text(jobCount + ' item');

				  if(jobCount == '0') {$('.no-result').show();}
					else {$('.no-result').hide();}
						  });
				});								
				</script>
			</div>
		</div>
	</div>
</section>

	<!-- Login Window -->
	<div aria-hidden="true" aria-labelledby="ViewResidentModal" class="modal fade" id="ViewResidentModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body" style="padding-top:0px;">
					<div class="form-title text-center" style="padding-bottom: 20px">
						<h4>Resident Details</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<div class="form-group">
							<image src="">
						</div>	
						<div class="form-group">
							<input class="form-control" id="email" name="email" placeholder="Enter your email address..." type="email" disabled>
						</div>
						<div class="form-group">
							<input class="form-control" id="password" name="password" placeholder="Enter your password..." type="password" disabled>
						</div>
						<button class="btn btn-info btn-block btn-round" type="submit">Login</button> 
						<br>

					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">

				</div>
			</div>
		</div>
	</div>

<!-- ********************************
     *         CREATE SERVICE       *
	 ******************************** -->
<section class="section create-stories pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/events/event_04.jpg" alt="Story-Image">
					<!-- Heading -->
					<h2>Our Story</h2>
					<!-- Story -->
					<p>Men go abroad to wonder at the heights of mountains, 
					at the huge waves of the sea, at the long courses of the rivers, 
					at the vast compass of the ocean, at the circular motions of the stars, 
					and they pass by themselves without wondering.</p>
				</div>
			</div>
			<div class="col-lg-6 mt-5 mt-lg-0">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/events/event_06.jpg" alt="Story-Image">
					<!-- Heading -->
					<h2>What we do</h2>
					<!-- Story -->
					<p>Some may serve for hope of earthly reward. 
					Such a man or woman might serve in Church positions or in private acts of mercy in an 
					effort to achieve prominence or cultivate contacts that would increase income or aid in acquiring
					wealth. Others might serve in order to obtain worldly honors, prominence, or power.</p>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ********************************
     *         QUOTES KEME          *
	 ******************************** -->
<section class="section quotes pt-0">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<div class="quote-slider">
					<div class="item mb-4">
						<!-- Quote -->
						<h2>What you see is what you get, nothing more, nothing less.</h2>
						<!-- Company -->
						<cite class="ml-0">-Kendrick Lamar</cite>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ********************************
     *			PARTNERSHIP         *
	 ******************************** -->
<section class="section clients bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<h3>Our Barangay was featured In</h3>
				<div class="client-slider">
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/business-finder.png" alt="business-finder">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/forbes.png" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/venture-beat.png" alt="venture-beat">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/tech-crunch-new.png" alt="TechCrunch">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/forbes.png" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="<?php echo base_url(); ?>assets/images/clients/venture-beat.png" alt="venture-beat">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ********************************
     *			OFFICIALS           *
	 ******************************** -->
<section class="section investors">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Our Barangay Officials</h2>
					<p>If cartoon bluebirds were real, a couple of 'em would be sitting on your shoulders singing right now.</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_04.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_05.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_06.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_07.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_08.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_09.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_10.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/officials/official_11.jpg" alt="investor">
					</div>
					<!-- Company -->
					<h3>Sacred Heart</h3>
					<!--  -->
					<p>Barangay Official</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ********************************
     *			RESIDENTS           *
	 ******************************** -->
<section class="section cta-hire bg-gary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<!-- Hire Title -->
				<h2>We are hunting Passionate Residents</h2>
				<!-- Job Description -->
				<p>Be curious. Use data. Leverage imagination. Be an expert. Be an enthusiast. Be authentic. Know your competition. 
				Hiring is the most important people function you have, and most of us aren’t as good at it as we think.
				Refocusing your resources on hiring better will have a higher return than almost any training program you can develop. </p>
				<!-- Action Button -->
				<a href="<?php echo base_url(); ?>home/register" class="mt-3 btn btn-main-md">Register as a Resident</a>
			</div>
		</div>
	</div>
</section>

<!--====  End of Section comment  ====-->

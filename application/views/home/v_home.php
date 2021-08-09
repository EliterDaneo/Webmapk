	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<?php foreach ($berita as $key => $value) { ?>
					<div id="home" class="first-section" style="background-image:url(<?= base_url('assets/img/gambar_berita/'. $value->gambar_berita) ?>)"></div>
						<div class="dtab">
							<div class="container">
								<div class="row">
									<div class="col-md-12 col-sm-12 text-right">
										<div class="big-tagline">
											<h2><strong>Shared Hosting</strong> Company</h2>
											<p class="lead">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
											<a href="#" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Read More</span></a>
										</div>
									</div>
								</div><!-- end row -->            
							</div><!-- end container -->
						</div>
					</div><!-- end section -->
				<?php } ?>
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
	
	<div id="domain" class="section wb">
		<div class="container">
			<div class="row text-center">

				<div class="col-lg-12">
					<form class="checkdomain form-inline">
						<div class="checkdomain-wrapper">
							<div class="form-group">
								<label class="sr-only" for="domainnamehere">Domain name</label>
								<input type="text" class="form-control" id="domainnamehere" placeholder="Enter domain name here..">
								<button type="submit" class="btn btn-primary grd1"><i class="fa fa-search"></i></button>
							</div>
							<hr>
							<div class="clearfix"></div>
							<div class="checkbox checkbox-warning">
								<input id="domaincom" type="checkbox" class="styled" checked>
								<label for="domaincom">.com</label>
							</div>
							<div class="checkbox checkbox-warning">
								<input id="domainnet" type="checkbox" class="styled" checked>
								<label for="domainnet">.net</label>
							</div>
							<div class="checkbox checkbox-warning">
								<input id="domainorg" type="checkbox" class="styled">
								<label for="domainorg">.org</label>
							</div>
							<div class="checkbox checkbox-warning">
								<input id="domaintv" type="checkbox" class="styled">
								<label for="domaintv">.tv</label>
							</div>
							<div class="checkbox checkbox-warning">
								<input id="domaininfo" type="checkbox" class="styled">
								<label for="domaininfo">.info</label>
							</div>
						</div><!-- end checkdomain-wrapper -->
					</form>
				</div>
				<div class="col-lg-12">
					<div class="customwidget text-center">
						<h1>Find Your Domain</h1>
						<p>With our awesome domain name search form, you can search any domain names with tons of extensions.</p>
						<p>Pursuing high quality standards, my greatest efforts are focused on producing semantic, SEO-friendly, valid and clean code. In order to stay effective and relevant in this constantly evolving sphere I always try to be in touch with the latest news and recent approaches in programming.</p>
						<ul class="list-inline">
							<li><i class="fa fa-check"></i> 20k Domains Sold in 2017</li>
							<li><i class="fa fa-check"></i> 4k Website Created</li>
						</ul>
						<!-- end list -->
						<a href="#" class="hover-btn-new"><span>Hosting Packages</span></a>
					</div>
				</div>
				
				<!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	
	<div id="overviews" class="section lb">
		<div class="container">
			<div class="section-title row text-center">
				<div class="col-md-8 offset-md-2">
					<h3>About</h3>
					<p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
				</div>
			</div><!-- end title -->

			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="message-box">
						<h4>2018 BEST WEB HOSTING COMPANY</h4>
						<h2>Awards Winner Support Center</h2>
						<p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>

						<p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis montes, nascetur ridiculus mus. Sed vitae rutrum neque. </p>

						<a href="#" class="hover-btn-new"><span>Learn More</span></a>
					</div><!-- end messagebox -->
				</div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn">
						<img src="<?= base_url() ?>assets/front-end/images/about_02.jpg" alt="" class="img-fluid img-rounded">
					</div><!-- end media -->
				</div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn">
						<img src="<?= base_url() ?>assets/front-end/images/about_03.jpg" alt="" class="img-fluid img-rounded">
					</div><!-- end media -->
				</div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="message-box">
						<h2>The standard Lorem Ipsum passage, used since the 1500s</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum.</p>

						<a href="#" class="hover-btn-new"><span>Learn More</span></a>
					</div><!-- end messagebox -->
				</div><!-- end col -->
				
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

	<section class="page-section">
		<div class="container">
			<div class="section-title row text-center">
				<div class="col-md-8 offset-md-2">
					<h3>Our history</h3>
					<p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
				</div>
			</div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<h2>2018</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<h2>2015</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2014</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-04">
								<h2>2012</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<h2>2010</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<h2>2007</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2004</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-04">
								<h2>2002</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-hosting"></i></span>
					<p class="stat_count">12000</p>
					<h3>Hosted Sites</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-domain-registration"></i></span>
					<p class="stat_count">24000</p>
					<h3>Sold Domains</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-mail"></i></span>
					<p class="stat_count">5000</p>
					<h3>Email Accounts</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

	<div id="pricing" class="section lb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Ready to get started?</h3>
				<p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			</div><!-- end title -->

			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="message-box">
						<ul class="nav nav-pills nav-stacked" id="myTabs">
							<li><a class="active" href="#tab1" data-toggle="pill">Monthly Subscription</a></li>
							<li><a href="#tab2" data-toggle="pill">Yearly Subscription</a></li>
						</ul>
					</div>
				</div><!-- end col -->
			</div>

			<hr class="invis">

			<div class="row">
				<div class="col-md-12">
					<div class="tab-content">
						<div class="tab-pane active fade show" id="tab1">
							<div class="row text-center">
								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>Shared Hosting</h2>
											<h3>$85/month</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>WordPress Hosting</h2>
											<h3>$59/month</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>Reseller Hosting</h2>
											<h3>$85/month</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end pane -->

						<div class="tab-pane fade" id="tab2">
							<div class="row text-center">
								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>Shared Hosting</h2>
											<h3>$85/Year</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>WordPress Hosting</h2>
											<h3>$59/Year</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="pricing-table pricing-table-highlighted">
										<div class="pricing-table-header grd1">
											<h2>Reseller Hosting</h2>
											<h3>$85/Year</h3>
										</div>
										<div class="pricing-table-space"></div>
										<div class="pricing-table-features">
											<p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
											<p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
											<p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
											<p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
											<p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
										</div>
										<div class="pricing-table-sign-up">
											<a href="#" class="hover-btn-new"><span>Order Now</span></a>
										</div>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end pane -->
					</div><!-- end content -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

	<div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
		<div class="container">
			<div class="section-title text-center">
				<h3>Testimonials</h3>
				<p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			</div><!-- end title -->

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="testi-carousel owl-carousel owl-theme">
						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
								<p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_01.png" alt="" class="img-fluid">
								<h4>James Fernando </h4>
							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->

						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
								<p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_02.png" alt="" class="img-fluid">
								<h4>Jacques Philips </h4>
							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->

						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
								<p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_03.png" alt="" class="img-fluid ">
								<h4>Venanda Mercy </h4>
							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->
						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
								<p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_01.png" alt="" class="img-fluid">
								<h4>James Fernando </h4>
							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->

						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
								<p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_02.png" alt="" class="img-fluid">
								<h4>Jacques Philips </h4>
							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->

						<div class="testimonial clearfix">
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
								<p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
							</div>
							<div class="testi-meta">
								<img src="<?= base_url() ?>assets/front-end/images/testi_03.png" alt="" class="img-fluid">
								<h4>Venanda Mercy </h4>
							</div>
							<!-- end testi-meta -->
						</div><!-- end testimonial -->
					</div><!-- end carousel -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

	<div class="parallax section dbcolor">
		<div class="container">
			<div class="row logos">
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_01.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_02.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_03.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_04.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_05.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
					<a href="#"><img src="<?= base_url() ?>assets/front-end/images/logo_06.png" alt="" class="img-repsonsive"></a>
				</div>
			</div><!-- end row -->
		</div><!-- end container -->
    </div><!-- end section -->
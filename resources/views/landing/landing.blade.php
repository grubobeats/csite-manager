
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Construction Manager v1.0.0.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Manage all kinds of construction sites including diaries and workers" />
	<meta name="keywords" content="Manage all kinds of construction sites including diaries and workers" />
	<meta name="author" content="givemejobtoday.com" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Construction Manager v1.0.0."/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content="Construction Manager"/>
	<meta property="og:description" content="Manage all kinds of construction sites including diaries and workers"/>
	<meta name="twitter:title" content="Construction Manager" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/icomoon.css') }}">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/simple-line-icons.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/magnific-popup.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/bootstrap.css') }}">

	<link rel="stylesheet" href="{{ URL::to('/landing_files/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ URL::to('/landing_files/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ URL::to('/landing_files/js/respond.min.js') }}"></script>
	<![endif]-->

		<!-- Scripts -->
		<script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

            var rootPath = "{{ URL::to('/') }}";
            var locale = "{{ Session::get('locale') }}";
		</script>

	</head>
	<body>
	<header role="banner" id="fh5co-header">
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		         <a class="navbar-brand" href="index.html">Construction Manager</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-left">
						<li>
							<select
									name="language-picker"
									class="language-picker">
								<option value="0">Language</option>
								<option value="en">English</option>
								<option value="sr">Srpski</option>
							</select>

						</li>
						<script>
							var languageRoute = "{{ route('language', ['lang'=>'en']) }}"
						</script>
						{{--<li><a href="{{ route('language', ['lang'=>'en']) }}" class="external">En</a></li>--}}
						{{--<li><a href="{{ route('language', ['lang'=>'sr']) }}" class="external">Srb</a></li>--}}
					</ul>

					
		          <ul class="nav navbar-nav navbar-right">
		            <li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
		            <li><a href="#" data-nav-section="testimonials"><span>Testimonials</span></a></li>
		            <li><a href="#" data-nav-section="services"><span>What this does?</span></a></li>
		            <li><a href="#" data-nav-section="about"><span>Premium</span></a></li>
		            <li><a href="#" data-nav-section="contact"><span>Contact</span></a></li>
		            <li><a href="#" class="external"><span>Blog</span></a></li>

					  @if (Auth::guest())
						  <li>
							  <a href="/public/login" class="external">
								  <i class="fh5co-intro-icon icon-login"></i>
							  </a>
						  </li>
					  @else
						  <li><a href="{{ url('/dashboard') }}" class="external" title="@lang('global.dashboard')"><i class="fh5co-intro-icon icon-folder"></i></a></li>
						  <li><a href="{{ url('/logout') }}"
								 title="Logout"
								 class="external"
								 onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
								  <i class="fh5co-intro-icon icon-logout"></i>
							  </a>
						  </li>

						  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							  {{ csrf_field() }}
						  </form>
					  @endif
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>

	<section id="fh5co-home" data-section="home" style="background-image: url({{ URL::to('landing_files/images/full_image_2.jpg') }});" data-stellar-background-ratio="0.5">
		<div class="gradient"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h1 class="to-animate">{{ trans('landing.welcome') }}</h1>
							<h2 class="to-animate">We developed simple software with high capabilities to maintain many construction sites at once - for free.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slant"></div>
	</section>

	<section id="fh5co-intro">
		<div class="container">
			<div class="row row-bottom-padded-lg">

				<div class="fh5co-block to-animate" style="background-image: url({{ URL::to('landing_files/images/img_10.jpg') }} ));">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-home"></i>
						<h2>Construction sites</h2>
						<p>This tool can help you to handle unlimited number of construction sites with all their data so you can always find information that you need.</p>
					</div>
				</div>

				<div class="fh5co-block to-animate" style="background-image: url({{ URL::to('landing_files/images/img_7.jpg') }} );">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-book-open"></i>
						<h2>Diaries</h2>
						<p>Our biggest feature and reason for existing of this tool is our Diaries section. With this tool you are able to handle all data of construction diaries.
							<a href="#">Read more</a> about diaries
						</p>
					</div>
				</div>

				<div class="fh5co-block to-animate" style="background-image: url({{ URL::to('landing_files/images/img_8.jpg') }} ));">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-people"></i>
						<h2>Workers</h2>
						<p>Manage all your workers (unlimited number), their salaries, hourly rates, working hours, analyses and much more.
							More about <a href="#">workers</a> section.</p>
					</div>
				</div>

			</div>
			<div class="row watch-video text-center to-animate">
				<span>Watch the video</span>

				<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><i class="icon-play2"></i></a>
			</div>
		</div>
	</section>

	<section id="fh5co-testimonials" data-section="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Testimonials</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Some of people from internationally known companies all over the world are already using our services.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony">
						<blockquote class="to-animate-2">
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<div class="author to-animate">
							<figure>
								<img src="{{ URL::to('landing_files/images/person1.jpg') }}" alt="Person">
							</figure>
							<p>
							Jean Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-testimony">
						<blockquote class="to-animate-2">
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<div class="author to-animate">
							<figure><img src="{{ URL::to('landing_files/images/person2.jpg') }}" alt="Person"></figure>
							<p>
							John Doe, Senior UI <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box-testimony">
						<blockquote class="to-animate-2">
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. &rdquo;</p>
						</blockquote>
						<div class="author to-animate">
							<figure><img src="{{ URL::to('landing_files/images/person3.jpg') }}" alt="Person"></figure>
							<p>
							Chris Nash, Director <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span>
							</p>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</section>

	<section id="fh5co-services" data-section="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-left">
					<h2 class=" left-border to-animate">What this does?</h2>
					<div class="row">
						<div class="col-md-8 subtext to-animate">
							<h3>
								This tool is developed for construction managers, construction entrepreneurs and everyone who needs full control on diaries and their workers in construction bussiness.
							</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-home"></i>
					<h3>Construction Sites</h3>
					<p>Many of you had a big problem to manage, keep and track information about construction sites when you have more than just one. Well - no more, we are helping you to keep all information in one place, on cloud, easily reachable and secure.</p>
				</div>
				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-notebook"></i>
					<h3>Construction Diaries</h3>
					<p>Our biggest feature is construction diaries section where you can write about everything that happened particular day, upload photos, connect diaries with construction sites, generate dynamic weather informations from yahoo weather and much more.</p>
				</div>

				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-clock"></i>
					<h3>Working hours</h3>
					<p>If you as many of us had issues to properly manage working hours of each worker, construction site, calculating salaries based by hourly rate of each worker than you certainly need this tool. We made it easy to use and efficient.</p>
				</div>
				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-share"></i>
					<h3>Sharing</h3>
					<p>Very often you have to share your diaries with your co-workers, investor, other managers or just with you on other devices. We solved this problem very easily by enabling quick email and unique link sharing for every worker and diary.</p>
				</div>
				
			</div>
		</div>
	</section>
	
	<section id="fh5co-about" data-section="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Pricing plans</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Our tool is 100% free!<br>However if you want to activate premium features subscribe to our monthly plans.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure>
							<div class="price-wrap">
								<h2 class="price">0</h2>
								<span class="price-detail">€/month</span>
							</div>
						</figure>
						<h3>Basic</h3>
						<span class="fh5co-position">100% free</span>
						<p>Maintain your construction diaries for unlimited number of construction sites.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure>
							<div class="price-wrap">
								<h2 class="price">5</h2>
								<span class="price-detail">€/month</span>
							</div>
						</figure>
						<h3>Pro Monthly</h3>
						<span class="fh5co-position">Premium subscription</span>
						<p>Everything from basic plan plus new features for maintaining workers, unlimited amount of pictures to be saved on our servers</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure>
							<div class="price-wrap">
								<h2 class="price">50</h2>
								<span class="price-detail">€/year</span>
							</div>
						</figure>
						<h3>Pro Yearly</h3>
						<span class="fh5co-position">Mega premium subscription</span>
						<p>Everything from basic plan plus new features for maintaining workers, unlimited amount of pictures to be saved on our servers</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center" style="padding-top: 110px">
					<button class="btn btn-lg btn-primary">Register now!</button>
				</div>
			</div>
		</div>
	</section>
	
	<section id="fh5co-counters" style="background-image: url({{ URL::to('landing_files/images/full_image_1.jpg') }});" data-stellar-background-ratio="0.5">
		<div class="fh5co-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center to-animate">
					<h2>Interesting Facts</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="fh5co-counter to-animate">
						<i class="fh5co-counter-icon icon-user-following to-animate-2"></i>
						<span class="fh5co-counter-number js-counter" data-from="0" data-to="1287" data-speed="2000" data-refresh-interval="50">1287</span>
						<span class="fh5co-counter-label">Users</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="fh5co-counter to-animate">
						<i class="fh5co-counter-icon icon-home to-animate-2"></i>
						<span class="fh5co-counter-number js-counter" data-from="0" data-to="7946" data-speed="2000" data-refresh-interval="50">7946</span>
						<span class="fh5co-counter-label">Construction sites</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="fh5co-counter to-animate">
						<i class="fh5co-counter-icon icon-book-open to-animate-2"></i>
						<span class="fh5co-counter-number js-counter" data-from="0" data-to="92893" data-speed="2000" data-refresh-interval="50">92893</span>
						<span class="fh5co-counter-label">Diaries</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="fh5co-counter to-animate">
						<i class="fh5co-counter-icon icon-heart to-animate-2"></i>
						<span class="fh5co-counter-number js-counter" data-from="0" data-to="14" data-speed="2000" data-refresh-interval="50">14</span>
						<span class="fh5co-counter-label">Detonators</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Register now!</h2>
					{{--<div class="row">--}}
						{{--<div class="col-md-8 col-md-offset-2 subtext to-animate">--}}
							{{--<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>--}}
						{{--</div>--}}
					{{--</div>--}}
					<button class="btn btn-lg btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Click Here</button>
				</div>
			</div>
		</div>
	</section>

	<section id="fh5co-counters" style="background-color: rgb(82, 211, 170);">


		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 style="color: white;">Get In Touch</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext">
							<h3 style="color: white !important;">
								For all business inquires, questions and suggestions please feel free to write us about it. All critics and suggestions are highly appreciated here.
							</h3>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
					<h3 class="contact-info">Contact Info</h3>
					<ul class="fh5co-contact-info">
						<li class="fh5co-contact-address ">
							<i class="icon-home"></i>
							Moscow, Russia
						</li>
						<li><i class="icon-phone"></i> (123) 465-6789</li>
						<li><i class="icon-envelope"></i> vladan.paunovic.bg@gmail.com</li>
						<li><i class="icon-globe"></i> <a href="http://givemejobtoday.com/" target="_blank">givemejobtoday.com</a></li>
					</ul>
				</div>

				<div class="col-md-6">
					<h3 class="contact-info">Contact Form</h3>
					<div class="form-group ">
						<label for="name" class="sr-only">Name</label>
						<input id="name" class="form-control" placeholder="Name" type="text">
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" class="form-control" placeholder="Email" type="email">
					</div>
					<div class="form-group ">
						<label for="phone" class="sr-only">Phone</label>
						<input id="phone" class="form-control" placeholder="Phone" type="text">
					</div>
					<div class="form-group ">
						<label for="message" class="sr-only">Message</label>
						<textarea name="" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
					</div>
					<div class="form-group ">
						<button class="btn btn-primary btn-lg" type="submit"><i class="icon-envelope"></i> Send Message</button>
					</div>
				</div>
			</div>

		</div>


	</section>
	
	<footer id="footer" role="contentinfo">
		<a href="#" class="gotop js-gotop"><i class="icon-arrow-up2"></i></a>
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
					<p>&copy; Construction Manager. All Rights Reserved. <br>Created by <a href="http://givemejobtoday.com/" target="_blank">Vladan Paunovic</a></p>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="social social-circle">
						<li><a href="mailto:vladan.paunovic.bg@gmail.com"><i class="icon-envelope"></i></a></li>
						<li><a href="https://www.facebook.com/vladan.g.paunovic"><i class="icon-facebook"></i></a></li>
						<li><a href="https://telegram.me/grubobeats"><i class="icon-paper-plane"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	
	<!-- jQuery -->
	<script src="{{ URL::to('/landing_files/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ URL::to('/landing_files/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ URL::to('/landing_files/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ URL::to('/landing_files/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ URL::to('/landing_files/js/jquery.stellar.min.js') }}"></script>
	<!-- Counter -->
	<script src="{{ URL::to('/landing_files/js/jquery.countTo.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ URL::to('/landing_files/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::to('/landing_files/js/magnific-popup-options.js') }}"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="{{ URL::to('/landing_files/js/google_map.js') }}"></script>

	<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
	<script src="{{ URL::to('/landing_files/js/jquery.style.switcher.js') }}"></script>
	<script>
		$(function(){
			$('#colour-variations ul').styleSwitcher({
				defaultThemeId: 'theme-switch',
				hasPreview: false,
				cookie: {
		          	expires: 30,
		          	isManagingLoad: true
		      	}
			});	
			$('.option-toggle').click(function() {
				$('#colour-variations').toggleClass('sleep');
			});
		});
	</script>
	<!-- End demo purposes only -->

	<!-- Main JS (Do not remove) -->
	<script src="{{ URL::to('landing_files/js/main.js') }}"></script>

	</body>
</html>


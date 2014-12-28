<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title('&laquo;', true, 'right'); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
                
                
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		
		<!-- Font Awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- jQuery -->
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery/jquery.min.js"></script>		
		
		<!-- FitText JavaScript -->
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fit-text/jquery.fittext.min.js"></script>
		
		<!-- Twitter Bootstrap -->
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/twitter-bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/twitter-bootstrap/css/bootstrap.min.css" type="text/css" media="screen"/>
		
		<!-- Placeholders -->
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery-placeholder-master/jquery.placeholder.min.js"></script>
		
		<!-- HTML 5 Shiv -->
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/html5shiv/html5shiv.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
                
                <!-- Contact form AJAX -->
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery/mailer.min.js"></script>
                
                <!-- Google Map API KEY -->
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA_SqQ1jC2XCd-NuCxCgSNuq3Cxv6QVf8s&sensor=false"></script>
                
                <script>
                   
                   var myCenter = new google.maps.LatLng(51.508742,-0.120850);
                   var marker;
                   
                    function initialize()
                    {
                        var option_choice;

                        if($(window).width() >= 992)
                        {
                            option_choice = true;
                        }
                        else
                        {
                            option_choice = false;
                        }
                        
                       var myOptions = {
                            zoom: 8,
                            center: myCenter,
                            scrollwheel: false,
                            navigationControl: false,
                            mapTypeControl: false,
                            scaleControl: false,
                            draggable: option_choice,
                            

                        
                            disableDefaultUI:true,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}]
                        };

                        var map = new google.maps.Map(document.getElementById('map'), myOptions);
                        
                        google.maps.event.addDomListener(window, "resize", function() 
                        {
                            var center = map.getCenter();
                            google.maps.event.trigger(map, "resize");
                            map.setCenter(center); 
                        });
                        
                        marker=new google.maps.Marker({
                            position:myCenter,
                            animation:google.maps.Animation.BOUNCE
                        });

                        marker.setMap(map);
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>
		
	</head>
	
	<body <?php body_class(); ?>>
		
		<header>
			<div class="container-fluid">
				<div class="row" id="menu-nav-outer-container" style="padding-bottom:20px">
					<div class="menu-nav-container">
						
						<!-- Main Desktop Menu -->
						<div class="col-md-4 col-lg-3 hidden-xs hidden-sm  stickypeg">
							<a href="<?php echo get_option('home'); ?>" class="logo"> <?php bloginfo('site_name'); ?></a>
						</div>

						<div id="main-nav-menu-container">
							<nav class="col-md-8 col-lg-9 hidden-xs hidden-sm">
								<a class="nav-about-me-section-item" href="#about-me-section">About Me</a>
								<a class="nav-featured-work-section-item" href="#featured-work-section">Featured Work</a> 
								<a class="nav-get-in-contact-section-item" href="#get-in-contact-section">Get in Contact</a>
							</nav>
						</div>	

						<!-- Mobile Menu -->
						<div class="col-xs-9 col-sm-6 visible-xs visible-sm stickypeg">
							<a href="<?php echo get_option('home'); ?>" class="logo-mobile">RL - Portfolio</a>
						</div>
						<div class="col-xs-3 col-sm-6 col-md-8 col-lg-9 nav-back-icon"><span class="go-back-words">Back to Home</span><a id="back-button-id" href="<?php echo get_option('home'); ?>"><i class="fa fa-chevron-circle-right"></i></a></div>
						<a class="col-xs-3 col-sm-6 visible-xs visible-sm mobile-menu-icon"><i class="fa fa-bars"></i></a>
					</div>
				</div>
				
				<!-- Mobile Menu Slide Down -->
				<div class="row visible-xs visible-sm mobile-nav">
					<nav>
						<a style="border-bottom:solid white 1px;" class="col-xs-12 col-sm-12" href="#about-me-section">About Me</a>	
						<a style="border-bottom:solid white 1px;" class="col-xs-12 col-sm-12" href="#featured-work-section">Featured Work</a>
						<a class="col-xs-12 col-sm-12" href="#get-in-contact-section">Get in Contact</a>
					</nav>
				</div>
			</div>
		</header>
		
 
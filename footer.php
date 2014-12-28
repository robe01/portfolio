		<footer class="container-fluid">	
			<div class="footer-padding">
				<div class="row">
					<div class="col-xs-12 hidden-xs text-align-right">
						<span>&#169; Copyright <?php echo date('Y'); ?> <?php bloginfo('site_name'); ?></span>
					</div>
					<div class="col-xs-12 visible-xs mobile-footer-info">&#169; Copyright <?php echo date('Y'); ?> <?php bloginfo('site_name'); ?></div>
				</div>
			</div>
		</footer>
		<script>


			$(document).ready(function()
			{   
                            $('#testimony-slide-carousel').on('slid.bs.carousel', function() 
                            {
                                $("#testimony-slide-carousel h2").fitText(5, { minFontSize: '20px', maxFontSize: '40px' });
                                $(".slide-show-container p").fitText(5, { minFontSize: '15px', maxFontSize: '25px' });
                            });
                        });
                        
                        $(window).resize(function()
                        {
                            $("#logo_title").fitText(1.2, { minFontSize: '35px', maxFontSize: '70px' });
                            $(".container-fluid").fitText(3, { minFontSize: '14px', maxFontSize: '16px' });
                            $("h1").fitText(1.2, { minFontSize: '35px', maxFontSize: '60px' });
                            $("h4").fitText(2, { minFontSize: '15px', maxFontSize: '20px' });
                            $("#get-in-contact-section form div input, textarea, select,option").fitText(3, { minFontSize: '12px', maxFontSize: '18px' });
                            $("#testimony-slide-carousel h2").fitText(2, { minFontSize: '20px', maxFontSize: '40px' });
                            $(".slide-show-container p").fitText(2, { minFontSize: '15px', maxFontSize: '25px' });
                        });
                        
                        $(document).ready(function()
                        {
                            $("#logo_title").fitText(1.2, { minFontSize: '35px', maxFontSize: '70px' });
                            $(".container-fluid").fitText(3, { minFontSize: '14px', maxFontSize: '16px' });
                            $("h1").fitText(1.2, { minFontSize: '35px', maxFontSize: '60px' });
                            $("h4").fitText(2, { minFontSize: '15px', maxFontSize: '20px' });
                            $("#get-in-contact-section form div input, textarea, select,option").fitText(3, { minFontSize: '12px', maxFontSize: '18px' });
                            $("#testimony-slide-carousel h2").fitText(2, { minFontSize: '20px', maxFontSize: '40px' });
                            $(".slide-show-container p").fitText(2, { minFontSize: '15px', maxFontSize: '25px' });
                        });
                        	


			//------------------------------------------------------------------------------------

			
			/* Change the colour of a menu item based on whether its section is currently on screen */
			
			function changeNavColorWhenScrolledSectionOn(element, menuItem, classToAdd){

				var half_the_size_of_viewport = $(window).height()/2;
				var bottom_of_fixed_menu = $(".menu-nav-container").outerHeight()+half_the_size_of_viewport;
				var top_of_object = $(element).offset().top + $(window).height() - bottom_of_fixed_menu;
				var bottom_of_window = $(window).scrollTop() + $(window).height();
				var height_of_object = $(element).outerHeight();
				var bottom_of_object = $(element).offset().top + $(window).height() - bottom_of_fixed_menu + height_of_object;

				/* If the object is completely visible in the window, fade it in */
				if(bottom_of_window >= top_of_object)
				{
					$(menuItem).addClass(classToAdd);
				}
				else
				{
					$(menuItem).removeClass(classToAdd);
				}
				if( bottom_of_window >= bottom_of_object )
				{
					$(menuItem).removeClass(classToAdd);
				}
			}; 
			
			
			//------------------------------------------------------------------------------------
			
			//Change the navigation link colour  
			
			function changeNavColorWhenScrolledSectionOnForAllThreeLinks(){
				changeNavColorWhenScrolledSectionOn('#about-me-section','.nav-about-me-section-item','white');
				changeNavColorWhenScrolledSectionOn('#featured-work-section','.nav-featured-work-section-item','pink');
				changeNavColorWhenScrolledSectionOn('#get-in-contact-section','.nav-get-in-contact-section-item','green');
			};
			
			$(document).ready(function(){
				
				/* Every time the window is scrolled ... */
				$(window).scroll(function(){
					changeNavColorWhenScrolledSectionOnForAllThreeLinks();
				});
				
				/* Every time the window is resized... */
				$(window).resize(function(){
					changeNavColorWhenScrolledSectionOnForAllThreeLinks();
				});
			});
			
			//----------------------------------------------------------------------------------------
			
			/*Placeholders jQuery*/
		   
			$(function(){
				$('input').placeholder();
			});
			

			//Bottom shadow for the header when the page is scrolled
			
			var delay = 500;
			var timeout = null;
			$(window).scroll(function()
			{	
				$("header").addClass("bottom_shadow");
				
				clearTimeout(timeout);
				timeout = setTimeout(function()
				{
					$("header").addClass("show_shadow");
					$("header").removeClass("bottom_shadow");
				},delay);
			});
		
			
			/*Scroll down to a link that is clicked*/
		
			$(function(){
				$('nav a').click(function() {
					if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
				
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						$('.mobile-nav nav').hide();
						$(".fa-bars").removeClass("clicked");
						repositionSlideShowContainer();
						var heightofheadercontainer = $("#menu-nav-outer-container").outerHeight();
						
						if (target.length){
							$('html,body').animate({scrollTop: target.offset().top-heightofheadercontainer+1}, 1200);
							return false;
						}
					}
				});
			});
		
		
			/*Mobile menu navigation*/
			
			$(document).ready(function(){
                
				//Slide toogle the navigation menu
				$('.fa-bars').click(function(){
                    $('.mobile-nav nav').slideToggle(0, function(){
						repositionSlideShowContainer();
					});
                });
				
				//Making the icon rotate once clicked on
				$(".fa-bars").click(function () {
					$(".fa-bars").toggleClass("clicked");
				});
            });
			
			
			/*Reset the mobile menu icon back to its normal colour, whenever the window is resized from mobile view to desktop view*/
			
			$(window).resize(function(){
				if($(window).width() > 768)
				{
					$(".fa-bars").removeClass("clicked");
					$('.mobile-nav nav').hide();
				};
			});
			
			
			/*Smooth scrolling for Internet Explorer browser only. Works up till version 11*/
			
			function GetIEVersion() {
				var sAgent = window.navigator.userAgent;
				var Idx = sAgent.indexOf("MSIE");

				// If IE, return version number.
				if (Idx > 0) 
				  return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

				// If IE 11 then look for Updated user agent string.
				else if (!!navigator.userAgent.match(/Trident\/7\./)) 
				  return 11;

				else
				  return 0; //It is not IE
			};

			if (GetIEVersion() > 0)
			{
				if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
				window.onmousewheel = document.onmousewheel = wheel;

				var time = 100;
				var distance = 350;

				function wheel(event) {
					if (event.wheelDelta) delta = event.wheelDelta / 120;
					else if (event.detail) delta = -event.detail / 3;

					handle();
					if (event.preventDefault) event.preventDefault();
					event.returnValue = false;
				}

				function handle() {

					$('html, body').stop().animate({
						scrollTop: $(window).scrollTop() - (distance * delta)
					}, time);
				}

				$(document).keydown(function (e) {

					switch (e.which) {
						//up
						case 38:
							$('html, body').stop().animate({
								scrollTop: $(window).scrollTop() - distance
							}, time);
							break;

							//down
						case 40:
							$('html, body').stop().animate({
								scrollTop: $(window).scrollTop() + distance
							}, time);
							break;
					}
				});
			};
			
			
			/*---------------------------------------------------------------------------------------*/

			//For displaying the go back icon and normal menu on different pages (e.g index and single pages)

			$(document).ready(function()
			{
				//Show the back button on the navigation menu only when the user is on the single.php page
				
				if($('#article-section').length)
				{
					$(".nav-back-icon").css("display", "block");
				};
				
				//Show the main navigation menu on the index page only
				
				if($('#about-me-section').length)
				{
					$("#main-nav-menu-container").css("display", "block");
					$("a .fa-bars").css("display", "block");
				};
			});


			//Back to home button message

			var fade_in_back_to_home_message = function(){
				if($(window).width() > 768)
				{	
					$(".go-back-words").removeClass("hide");

					$('.fa-chevron-circle-right').mouseover(function()
					{	
						$(".go-back-words").animate({'opacity':'1'},{
							duration: 200,
							queue: false
						});

						$(".go-back-words").animate({right: "0px"},{
							duration: 200,
							queue: false
						});
					});

					$('.fa-chevron-circle-right').mouseout(function()
					{	
						$(".go-back-words").animate({'opacity':'0'},{
							duration: 200,
							queue: false
						});

						$(".go-back-words").animate({right: "30px"},{
							duration: 200,
							queue: false
						});
					});
				}
				else
				{
					$(".go-back-words").addClass("hide");
				}
			};
			
			$(".go-back-words").addClass("hide");
			$(document).ready(fade_in_back_to_home_message);
			$(window).resize(fade_in_back_to_home_message);
			
			
			//------------------------------------------------------------------------------------
			

			//featured work items hover effect
			
			var featured_work_items_hover_effect = function()
			{		
				/*Hover effect for featured work items*/
				$('.featured-work-containers').hover(function()
				{
					var element_id = $(this).attr('id');
					$('#'+element_id+' .featured-work-item a').addClass('show-open-shade-over-img img');
					$('#'+element_id+' .featured-work-item .show-open-shade-over-img img').stop().animate({'opacity': '1'}, 200);
				}, 
				function()
				{
					var element_id = $(this).attr('id');
					$('#'+element_id+' .featured-work-item .show-open-shade-over-img img').stop().animate({'opacity': '0'},{
						duration: 200,
						complete: function(){
							$('#'+element_id+' .featured-work-item a').removeClass('show-open-shade-over-img img');
						}
					});		
				});
			};	
			$(document).ready(featured_work_items_hover_effect);
			

			/*--------------------------------------------------------------------------------------------*/


			//Ajax pagination refresh without reloading the page
	
			$(document).ready(function()
			{	
				$('.navigation').delegate('.pagination a', 'click', function(event){ //check when pagination link is clicked and stop its action.

					event.preventDefault();

					var link = $(this).attr('href'); //Get the href attribute

					$('#post-section-featured-items').fadeOut(300).load(link + ' #post-section-featured-items', function()
					{ 
						$('.featured-work-containers').css({"opacity":"1","top":"0px"}); //To stop the fadein down effect
						$('#post-section-featured-items').fadeIn(300, function(){
							
							//Scroll to the top of the featured work section
							var heightofheadercontainer = $(".menu-nav-container").outerHeight();
							$('html, body').animate({scrollTop: $("#featured-work-section").offset().top-heightofheadercontainer+1}, 300);
						});
						$(document).ready(featured_work_items_hover_effect);
					});
					
					$('.navigation').load(link + ' .navigation', function()
					{
						$('.pagination').css({"opacity":"1","top":"0px"}); //To stop the fadein down effect
					});
				});
			});
			
			
			
			/*This section must be at the bottom---------------------------------------------------------*/
	
			/*JavaScript for preventing the overlapping of the still carousel and the sticky header*/
			var reposition_still_carousel_Container = function()
			{
				$(".stillCarousel").css({"margin-top": ($("#menu-nav-outer-container").outerHeight()+'px')});
			};	
			$(window).resize(reposition_still_carousel_Container);
			$(document).ready(reposition_still_carousel_Container);
			
			
			/*JavaScript for resizing the still carousel to be the same height as the view port*/
			var resizeSlideShowContainerBasedOnViewPort = function()
			{
				var menu_nav_container_menu_height = $(window).height()-$("#menu-nav-outer-container").outerHeight();
				$(".stillCarousel").css('height', menu_nav_container_menu_height);
			};	
			$(window).resize(resizeSlideShowContainerBasedOnViewPort);
			$(document).ready(resizeSlideShowContainerBasedOnViewPort);
			
			
			/*JavaScript for preventing the overlapping of the testimonial slide show and the sticky header*/
			var repositionSlideShowContainer = function()
			{
				$("#testimony-slide-show-container").css({"margin-top": ($("#menu-nav-outer-container").outerHeight()+'px')});
			};	
			$(window).resize(repositionSlideShowContainer);
			$(document).ready(repositionSlideShowContainer);
			
                        
                        /*JavaScript for preventing the overlapping of the 404 page main content and the sticky header*/
			var repositionSlideShowContainer = function()
			{
				$("#error-content").css({"margin-top": ($("#menu-nav-outer-container").outerHeight()+'px')});
			};	
			$(window).resize(repositionSlideShowContainer);
			$(document).ready(repositionSlideShowContainer);
                        
			
                        /*JavaScript for preventing the overlapping of the article section on a featured work item and the sticky header, when the testiomonial slide is hidden due to there being no given testimonials*/
			var repositionSlideShowContainer = function()
			{
                            if( ! $('#testimony-slide-show-container').length)
                            {
				$("#article-section").css({"margin-top": ($("#menu-nav-outer-container").outerHeight()+'px')});
                            }
			};	
			$(window).resize(repositionSlideShowContainer);
			$(document).ready(repositionSlideShowContainer);
                        
			
                        /*Logo and slogan responsive centering re-positioning*/

			var responsive_logo_and_slogan_positioning = function()
			{
				$(".logo_and_slogan_container").css({
					height : $(".stillCarousel").outerHeight(),
					width : $(".stillCarousel").outerWidth()
				});
			};
				
			$(window).resize(responsive_logo_and_slogan_positioning);
			$(document).ready(responsive_logo_and_slogan_positioning);
			
			
			//-----------------------------------------------------------------------------------------------
			
			
			/*jQuery for fading in and moving down an element when the user scrolls near to it*/
			
			var seen_list = []; //Create an array to note down that the element has been seen already, so it doesn't have to be faded in again
			
			function fadeInElement(element)
			{
				$(element).each(function(i)
				{
					var offset_the_element_height = 150;
					var bottom_of_object = $(this).offset().top+offset_the_element_height;
					var bottom_of_window = $(window).scrollTop() + $(window).height();

					/* If the object is completely visible in the window, fade it in */
					if( bottom_of_window >= bottom_of_object )
					{
						if($.inArray(i, seen_list) === -1)//Elements will only be faded in once
						{
							seen_list.push(i);
						
							$(this).animate({'opacity':'1'},{
								duration: 500,
								queue: false
							});

							$(this).animate({top: "0px"},{
								duration: 500,
								queue: false
							});
						};
					};
				}); 
			};
			
			//Fade in elements one after another. This is for the contact form's input buttons
			
			function fadeInElementsAfterEachOther(elementContainer, arrayOfElements)
			{
				var offset_the_element_height = 200;
				var bottom_of_object = $(elementContainer).offset().top+offset_the_element_height;
				var bottom_of_window = $(window).scrollTop() + $(window).height();

				/* If the object is completely visible in the window, fade it in */
				if( bottom_of_window >= bottom_of_object )
				{
					var delayFadeInTime = 0;
					
					$(arrayOfElements).each(function(i){
						delayFadeInTime = i * 150;
						$(this).delay(delayFadeInTime).animate({'opacity':'1'},100);
					});
				};
			};
			
			//Put the functions in another function to be called in scroll/ready window functions
			
			var fade_in_down_elements = function()
			{
				/* Every time the window is scrolled ... */
				fadeInElement('#logo_title,.contact-form-style h1, .contact-form-style iframe, .about-me-sections, .featured-work-containers, .pagination, #featured-work-section h1, .article-sections, .slide-show-container, .article-title, #map');
				fadeInElementsAfterEachOther('.contact-form-style form', '.contact-form-style input, .contact-form-style select, .contact-form-style textarea, .contact-form-style button');
			};
			$(document).ready(fade_in_down_elements);
			$(window).scroll(fade_in_down_elements);
			
			//------------------------------------------------------------------------------------
			
			
			
			$(document).ready(function()
			{	
                            $('.logo_and_slogan_container').css("display", "table-cell");    //put this here so that when the page loads the first time, the slogans will be resized by the FitText plugin.
                      
			});

		</script>
	<?php wp_footer(); ?>
	</body>
</html>
		<?php 
		/*
			Template Name: main
		*/
			get_header(); 
		?>
		
		<main class="container-fluid">
			
			<!-- Title of the main section which is hidden on the actual website -->
			<h1 style="display:none;">Main Section</h1>
			
			<!-- Slide Show Section-->
			<div class="row">
				<div class="stillCarousel">
					<div class="logo_and_slogan_container">
						<div id="logo_title">Robert Liverpool Portfolio</div>
					</div>
				</div>
			</div>
                        
			<!-- About Me Section-->
			<section id="about-me-section">	
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-offset-3">
						<div class="about-me-sections">
							<h1><?php the_block('Section 1 Header'); get_the_block('Section 1 Header', array('type' => 'one-liner')); ?></h1>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 about-me-image">
                                                                        <?php
                                                                            $picture_of_me_url = wp_get_attachment_url( get_post_thumbnail_id(5) );
                                                                        ?>
									<img src="<?php echo $picture_of_me_url; ?>" alt="Robert Liverpool" class="img-circle img-responsive"/>
								</div>
								<section class="col-sm-12 col-md-12 col-lg-12 about-me-section-info">
									<h4><?php the_block('Section 1 Sub Header 1'); get_the_block('Section 1 Sub Header 1', array('type' => 'one-liner')); ?></h4>
									<p><?php the_block('Section 1 Content 1'); get_the_block('Section 1 Content 1'); ?></p>
								</section>
							</div>
						</div>
					</div>
				</div>
				<div class="row about-me-second-level-section">
					<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 about-me-sections">
						<i class="fa fa-graduation-cap"></i>
						<h4><?php the_block('Section 1 Sub Header 2'); get_the_block('Section 1 Sub Header 2', array('type' => 'one-liner')); ?></h4>
						<p><?php the_block('Section 1 Content 2'); get_the_block('Section 1 Content 2'); ?></p>
					</section>
					<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 about-me-sections">
						<i class="fa fa-code"></i>
						<h4><?php the_block('Section 1 Sub Header 3'); get_the_block('Section 1 Sub Header 3', array('type' => 'one-liner')); ?></h4>
						<p><?php the_block('Section 1 Content 3'); get_the_block('Section 1 Content 3'); ?></p>
					</section>
					<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 about-me-sections">
						<i class="fa fa-certificate"></i>
						<h4><?php the_block('Section 1 Sub Header 4'); get_the_block('Section 1 Sub Header 4', array('type' => 'one-liner')); ?></h4>
						<p><?php the_block('Section 1 Content 4'); get_the_block('Section 1 Content 4'); ?></p>
					</section>
				</div>
			</section>
			
			<!-- Featured Work Section -->
			<section class="row" id="featured-work-section">
				<h1><?php the_block('Section 2 Header'); get_the_block('Section 2 Header', array('type' => 'one-liner')); ?></h1>
				
				<div id="post-section-featured-items">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
						<?php 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0]; 
						?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 featured-work-containers" id="featured-work-item-<?php $i; $i++; echo $i; ?>">
							<div class="featured-work-item">
								<img src="<?php echo $thumb_url ?>" alt="..." class="relative-image-position img-circle"/>
								<a href="<?php the_permalink() ?>" class="open-shade-over-img"><img src="<?php bloginfo('template_url'); ?>/images/shadeOver.png" alt="..." class="img-circle absolute-image-position"/></a>
								<a><h4><?php the_title(); ?></h4></a>
							</div>
						</div>
					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry. There is currently a problem with my list of featured work. Working ASAP to fix the issue.' ); ?></p>
					<?php endif; ?>
				</div>
				
				<!-- Medium and large devices pagination -->
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-md visible-lg navigation">
					<?php wpbeginner_numeric_posts_nav(); ?>
				</div>
				
				<!-- Small mobile pagination -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-sm navigation">
					<?php wpbeginner_numeric_posts_nav_mobile(); ?>
				</div>
				
				<!-- Extra Small mobile pagination -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs navigation">
					<?php wpbeginner_numeric_posts_nav_mobile(); ?>
				</div>		
				
			</section>
			
			<!-- Get in Touch Section -->
			<section class="row contact-form-style" id="get-in-contact-section">
				<h1><?php the_block('Section 3 Header'); get_the_block('Section 3 Header', array('type' => 'one-liner')); ?></h1>
					<div id="map"></div>
					<div id="contact-form-notifications"></div>
					<form id="ajax-contact" method="post" action="<?php bloginfo('template_url'); ?>/mailer.php">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group" id="from-field">
							Leave this field blank if you see it, it's for spam.
							<input type="text" name="from">
						</div>
						<div class="form-group">
							<input type="text" id="firstname" name="firstname" class="form-control" placeholder="* First Name...">
						</div>
						<div class="form-group">
							<input type="text" id="lastname" name="lastname" class="form-control" placeholder="* Last Name...">
						</div>
						<div class="form-group">
							<input type="text" id="email" name="email" class="form-control" placeholder="* Email Address...">
						</div>
						<div class="form-group">
							<input type="text" id="telephonenumber" name="telephonenumber" class="form-control" placeholder="  Telephone or Mobile Number...">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<textarea id="message" name="message" class="form-control" placeholder="* Write Your Message..."></textarea>
						</div>	
						<button type="submit" class="btn btn-danger btn-lg btn-block">Send Message</button>
					</div>
				</form>
			</section>
			
			<div id="loading-over-fade-background">
				<div id="loading-gif-container">
					<img src="<?php bloginfo('template_url'); ?>/images/loading.gif"/>
				</div>
			</div>
				
		</main>
		<?php

			get_footer();
<?php

get_header(); ?>
			
		<script>

			/*Carousel slide show*/
			$(document).ready(function()
			{			
				$('#testimony-slide-carousel').carousel({
					interval: 7000
				});
			});

		</script>

		<main class="container-fluid">
			
                        <!-- Testimony slide show section -->
                    
                        <?php 
                        
                            if(has_block('Testimony 1 Message') && has_block('Testimony 2 Message') && has_block('Testimony 3 Message'))
                            {
                               echo "<div class='row'>			
                                            <div id='testimony-slide-show-container'>
                                                    <div id='testimony-slide-carousel' class='carousel slide' data-ride='carousel'>
                                                            <ol class='carousel-indicators'>
                                                                    <li data-target='#testimony-slide-carousel' data-slide-to='0' class='active'></li>
                                                                    <li data-target='#testimony-slide-carousel' data-slide-to='1'></li>
                                                                    <li data-target='#testimony-slide-carousel' data-slide-to='2'></li>
                                                            </ol>

                                                            <div class='carousel-inner'>
                                                                    <div class='item active'>
                                                                            <div class='slide-show-container'>
                                                                                    <span><h2>&ldquo;", get_the_block('Testimony 1 Message', array('type' => 'one-liner')), "&rdquo;</h2><p>", get_the_block('Testimony 1 Client Name', array('type' => 'one-liner')), "</p></span>
                                                                            </div>
                                                                    </div>
                                                                    <div class='item'>
                                                                            <div class='slide-show-container'>
                                                                                    <span><h2>&ldquo;", get_the_block('Testimony 2 Message', array('type' => 'one-liner')), "&rdquo;</h2><p>", get_the_block('Testimony 2 Client Name', array('type' => 'one-liner')), "</p></span>
                                                                            </div>
                                                                    </div>
                                                                    <div class='item'>
                                                                            <div class='slide-show-container'>
                                                                                    <span><h2>&ldquo;", get_the_block('Testimony 3 Message', array('type' => 'one-liner')), "&rdquo;</h2><p>", get_the_block('Testimony 3 Client Name', array('type' => 'one-liner')), "</p></span>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>"; 
                            }
                        
                        ?>

			
                        
			<!-- Info Section-->
			
			<article class="row" id="article-section">
				<h1 class="article-title"><?php echo get_the_title(); ?></h1> 
				<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 article-sections">
					<i class="fa fa-wrench"></i>
					<h4>What Was Done</h4>
					<p><?php the_block('Content 1'); get_the_block('Content 1'); ?></p>
				</section>
				<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 article-sections">
					<i class="fa fa-exclamation-circle"></i>
					<h4>The Problem</h4>
					<p><?php the_block('Content 2'); get_the_block('Content 2'); ?></p>
				</section>
				<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 article-sections">
					<i class="fa fa-lightbulb-o"></i>
					<h4>The Solution</h4>
					<p><?php the_block('Content 3'); get_the_block('Content 3'); ?></p>
				</section>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-offset-3">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-sections">
						<div class="article-last-section">
							<a href="<?php the_block('Website Url'); get_the_block('Website Url', array('type' => 'one-liner')); ?>" class="btn btn-danger btn-lg">Visit the Website</a>
						</div>
					</div>
				</div>
			</article>
			
		</main>
			
<?php
get_footer();


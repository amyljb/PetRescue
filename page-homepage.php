<?php /* Template Name: Homepage */ get_header(); ?> 

	<?php 

/*------------------------------------*\
	Get Images
\*------------------------------------*/
		$image = get_field('featured_image');
		$about_image = get_field('about_background');
		$about_text_left = get_field('about_text_left');
		$about_text_right = get_field('about_text_right');
		$rehoming_bkg = get_field('rehoming_background');
		$news_bkg = get_field('news_background');
		$contact_bkg = get_field('contact_background');

/*------------------------------------*\
	JUMBOTRON
\*------------------------------------*/
		if( !empty($image) ): ?>

			<div id="top" class="jumbotron" style="background-image: url('<?php echo $image ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 800px;"></div>

		<?php endif;

/*------------------------------------*\
	ABOUT SECTION
\*------------------------------------*/

		if( !empty($about_image) ): ?>

			<div id="about" style="background-image: url('<?php echo $about_image ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 600px;">

				<h2 class="center">ABOUT</h2>
				<hr>
				<div class="container about-text">
				
					<?php if( !empty($about_text_left) ): ?>

						<div class="col-md-6">
							<p><?php the_field('about_text_left'); ?></p>
						</div>

					<?php endif; ?>

					<?php if( !empty($about_text_right) ): ?>

						<div class="col-md-6">
							<p><?php the_field('about_text_right'); ?></p>
						</div>

					<?php endif; ?>
					<div class="center">
						<button type="button" class="btn btn-standard">READ OUR BLOG</button>
					</div>
				</div>
			</div>

		<?php endif; 

/*------------------------------------*\
	REHOMING SECTION
\*------------------------------------*/ 

		if( !empty($rehoming_bkg) ): ?>

			<div id="rehoming"  style="background-image: url('<?php echo $rehoming_bkg ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 800px;">

				<h2 class="center">REHOMING</h2>
				<hr>


					<?php
						// The Query
						$query = new WP_Query( array( 'post_type' => 'dogprofile' ) ); 

						// The Loop ?>
						<?php if ( $query->have_posts() ) {
							echo '<div class="rehoming-container container ">';
								echo '<div class="row">'; ?>
									<!-- <img class="arrow-left col-sm-1" src="<?php echo get_template_directory_uri(); ?>/includes/images/arrow-L.png" alt="Left"> -->
										<?php while ( $query->have_posts() ) {
											$query->the_post();
												echo '<div class="col-md-3 card card-inverse">'; ?>
													<img class ="card-img dog_image img-responsive" alt="dog image" src="<?php the_field('dog_photo'); ?>" />
													<?php echo '<div class="card-img-overlay">';
														echo '<h3 class="card-title">' . get_field('dog_name') . '</h3>';
														echo '<p class="card-text">' . get_field('dog_breed') . '</p>';
														echo '<button>READ MORE</button>';
													echo '</div>';
												echo '</div>';
										} ?>
										<!-- <img class="arrow-right" src="<?php echo get_template_directory_uri(); ?>/includes/images/arrow-R.png" alt="Right">	 -->
									<?php echo '</div>';
								echo '</div>';
							/* Restore original Post Data */
							wp_reset_postdata();
						} else {
							// no posts found
							echo 'No posts found';
						} 
					?>
			</div>

		<?php endif; 

/*------------------------------------*\
	NEWS SECTION
\*------------------------------------*/
?>

<div class="clearfix"></div> 

		<?php if( !empty($news_bkg) ): ?>

			<div id="news"  style="background-image: url('<?php echo $news_bkg ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 600px;">

				<h2 class="center">NEWS & EVENTS</h2>
				<hr>

				<?php
						// The Query
						$query = new WP_Query( array( 'post_type' => 'newsevents' ) ); 

						// The Loop ?>
						<?php if ( $query->have_posts() ) {
							echo '<div class="news-container container ">';
								echo '<div class="row">'; ?>
									<!-- <img class="arrow-left col-sm-1" src="<?php echo get_template_directory_uri(); ?>/includes/images/arrow-L.png" alt="Left"> -->
										<?php while ( $query->have_posts() ) {
											$query->the_post();
												echo '<div class="col-md-3">';
													echo '<div>';
														echo '<h2>' . get_field('date') . '</h2>';
														echo '<h3>' . get_field('item_title') . '</h3>';
														echo '<p>' . get_the_excerpt() . '</p>';													
													echo '</div>';
													echo '<button>READ MORE</button>';
												echo '</div>';
										} ?>
										<!-- <img class="arrow-right" src="<?php echo get_template_directory_uri(); ?>/includes/images/arrow-R.png" alt="Right">	 -->
							<?php echo '</div>';
								echo '</div>';
								/* Restore original Post Data */
								wp_reset_postdata();
							} else {
								// no posts found
								echo 'No posts found';
							} 
					?>

			</div>

		<?php endif; 

/*------------------------------------*\
	CONTACT FORM
\*------------------------------------*/

		if( !empty($contact_bkg) ): ?>
		

			<div class="row" id="contact" style="background-image: url('<?php echo $contact_bkg ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover; height: 800px;">
				
				<div class="container">
				
					<form class="form-horizontal contact-form center col-lg-6" role="form" method="post" action="">
						<div class="form-group">						
							<div>
								<h2 class="center">CONTACT US</h2>
								<hr>
							</div>
						</div>
						<div class="form-group">						
							<div>
								<p>Integer id metus ante. Phasellus dignissim neque in lorem rutrum, vitae sagittis elit maximus. Vestibulum a massa ligula. Mauris sit amet gravida nunc, mollis sagittis eros. </p>		
							</div>
						</div>
						<div class="form-group">
							<div >
								<input type="text" class="form-control" id="name" name="name" required placeholder="FULL NAME">
							</div>
						</div>
						<div class="form-group">
							<div>
								<input type="email" class="form-control" id="email" name="email" required placeholder="EMAIL ADDRESS">
							</div>
						</div>
						<div class="form-group">
							<div>
								<textarea class="form-control" rows="4" name="message" required placeholder="MESSAGE"></textarea>
							</div>
						</div>
						<div>
							<div class="center">
								<input class="col-xs-12" id="contact-submit" name="submit" type="submit" value="SUBMIT" class="btn btn-primary">
							</div>
						</div>
						<div class="form-group">
							<div>
								<! Will be used to display an alert to the user>
							</div>
						</div>
					</form>

				</div>
			</div>

	<?php endif; ?>


<?php get_footer(); ?>
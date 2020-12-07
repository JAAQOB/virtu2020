<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single-career-template">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
  		    <div class="container">

				<div class="breadcrumbs--div">
					<div class="">
						<h2 class="breadcrumbs-in__h2">Kariera</h2>
							<?php the_breadcrumb(); ?>
						</div>
						<div class="hover-back-link">
							<i class="fas fa-angle-left"></i>
							<?php $back_to_career_link = get_field( 'back_to_career_link', 30 ); ?>
							<?php if ( $back_to_career_link ) : ?>
								<a class="returnpage" href="<?php echo esc_url( $back_to_career_link) ; ?>">Wróć do Kariera</a>
							<?php endif; ?>
					</div>
				</div>

			<div class="single-career">
				<h3><?php the_field( 'career_posts_heading' ); ?></h3>
				<?php if ( have_rows( 'career_posts_data' ) ) : ?>
					<?php while ( have_rows( 'career_posts_data' ) ) : the_row(); ?>
					<h4><?php the_sub_field( 'career_posts_data_heading' ); ?></h4>
					<?php if ( have_rows( 'career_posts_data_list' ) ) : ?>
						<ul>
						<?php while ( have_rows( 'career_posts_data_list' ) ) : the_row(); ?>
							<li><?php the_sub_field( 'career_posts_data_list_list_info' ); ?></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			</div>
			<?php if ( have_rows( 'benefits' ) ) : ?>
			<div class="single-career__benefits">
			<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/basil.png" alt="">
				<div class="container">
						<?php while ( have_rows( 'benefits' ) ) : the_row(); ?>
							<h3><?php the_sub_field( 'benefits_heading' ); ?></h3>
							<?php if ( have_rows( 'benefits_content' ) ) : ?>
								<div class="benefits_content">
									<?php while ( have_rows( 'benefits_content' ) ) : the_row(); ?>
										<div class="benefits_content__div">
											<?php $image = get_sub_field( 'benefits_content_icon' );
											if ( $image ) :
												$imageurl = wp_get_attachment_image_url($image, 'full');?>
												<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
												<p><?php the_sub_field( 'benefits_content_info' ); ?></p>
										</div>
										<?php endif;?>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>






			<?php if ( have_rows( 'send_cv' ) ) : ?>
				<div class="single-career__send-cv contact-form-template">
					<div class="container">
						<div class="row-nw">
							<div class="col-md-8">
								<?php while ( have_rows( 'send_cv' ) ) : the_row(); ?>
									<h3><?php the_sub_field( 'send_cv_heading' ); ?></h3>
									<p><?php the_sub_field( 'send_cv_short_info' ); ?></p>
									<h5><?php the_sub_field( 'send_cv_small_heading' ); ?></h5>
									<p><?php the_sub_field( 'send_cv_rodo' ); ?></p>
								<?php endwhile; ?>
								<div class="contact-form-div">
									<?php echo do_shortcode('[contact-form-7 id="542" title="Career CV"]'); ?>
								</div>
							</div>
							<img class="lazy lazy-loading career-img-bg" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/career-img-bg.png" alt="">
					</div>
				</div>
			</div>
		<?php endif; ?>


		<?php
			global $post;
			 $careerPosts = get_posts([
			'numberposts' => -1,
			'post_status' => 'publish',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'post_type' => 'career',
			'post__not_in' => [$post->ID]
		]);
		?>
		<?php if ( have_rows( 'othere_posts' ) ) : ?>
			<div class="other_posts career-template ">
				<img class="lazy lazy-loading rosemar" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
				<div class="container">
				<?php while ( have_rows( 'othere_posts' ) ) : the_row(); ?>
					<h2 class="heading-with-icon"><?php the_sub_field( 'othere_posts_heading' ); ?></h2>
				<?php endwhile; ?>
				<?php
					foreach ($careerPosts as $i => $careerPosts):
					$currentLink = get_permalink($careerPosts); ?>
					<div class="career_posts_data">
						<h3><?php the_field( 'career_posts_heading', $careerPosts ); ?></h3>
						<div class="career__content__div">
						<p><?php the_field( 'career_posts_additional_text', $careerPosts ); ?></p>
							<a href="<?php echo $currentLink ?>">Czytaj więcej</a>
						</div>
					</div>
					<?php endforeach; ?>
						<?php while ( have_rows( 'othere_posts' ) ) : the_row(); ?>
							<?php $othere_posts = get_sub_field( 'othere_posts' ); ?>
							<?php if ( $othere_posts ) : ?>
								<a class="btn" href="<?php echo esc_url( $othere_posts) ; ?>">Zobacz wszystkie</a>
							<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>

	</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>


<?php get_footer(); ?>

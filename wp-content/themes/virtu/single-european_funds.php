<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single-career-template">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
  		    <div class="container">
			<h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
			<?php the_breadcrumb(); ?>

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

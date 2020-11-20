<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="news-blog">
		<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
  		<div class="container">
			<h2 class="breadcrumbs__h2">Aktualności</h2>
			<?php the_breadcrumb(); ?>

			<div class="news-blog__loop">
				<div class="row">
					<?php get_template_part('loop'); ?>
				</div>
			</div>
			<?php get_template_part('pagination'); ?>
		</div>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

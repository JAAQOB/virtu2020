<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php if (!get_next_post_link()): ?>
	<div class="news-blog__loop">
		<article class="last-news" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(array(705,400)); // Declare pixel size you need inside the array ?>
					</a>
				<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<div class="loop-content-data">
					<p class="date"><?php the_time('F j, Y'); ?></p>
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
				<p><?php the_field( 'news_lead' ); ?></p>
			</div>
			<!-- /post title -->

			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

			<?php edit_post_link(); ?>

		</article>
	</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<h3 class="h3-blog-posts">Wszystkie wpisy</h3>
	<div class="news-blog__loop">
		<div class="row">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<?php if (!get_next_post_link()) { ?>

			<?php }else {?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(array(350,220)); // Declare pixel size you need inside the array ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<!-- post title -->
				<div class="loop-content-data">
					<p class="date"><?php the_time('F j, Y'); ?></p>
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<p><?php the_field( 'news_lead' ); ?></p>

					<a class="read-more-link-blog" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Czytaj więcej</a>
				</div>
				<!-- /post title -->

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->
		<?php } ?>
		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			</article>
			<!-- /article -->

		<?php endif; ?>
		</div>
	</div>
</div>

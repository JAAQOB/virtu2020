<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single-news">
	<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
  		<div class="container">

		  <div class="breadcrumbs--div">
					<div class="">
						<h2 class="breadcrumbs-in__h2">Aktualności</h2>
							<?php the_breadcrumb(); ?>
						</div>
						<div class="hover-back-link">
							<i class="fas fa-angle-left"></i>
							<?php $back_to_news_link = get_field( 'back_to_news_link', 9 ); ?>
							<?php if ( $back_to_news_link ) : ?>
								<a class="returnpage" href="<?php echo esc_url( $back_to_news_link) ; ?>"> Wróć do Aktualności</a>
							<?php endif; ?>
					</div>
				</div>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                <div class="text-with-image">
                    <div class="text-with-image__div col-md-7">
                        <div class="single-news__date-time">
                            <span class="date"><?php the_time('F j Y'); ?></span>
                            <p><?php _e( ' ', 'html5blank' ); the_category(' '); // Separated by commas ?></p>
                        </div>
                        <h1>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h1>
                        <p><?php the_field( 'news_text_with_image' ); ?></p>
                    </div>
                    <!-- post thumbnail -->
                        <img class="lazy lazy-loading leaf-top" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                        </a>
                    <!-- /post thumbnail -->
                </div>
				<?php endif; ?>

				<?php if ( have_rows( 'european_funds_items' ) ) : ?>
					<div class="text-with-image__div col-md-7">
                        <div class="single-news__date-time">
                            <span class="date"><?php the_time('F j Y'); ?></span>
                            <p><?php _e( ' ', 'html5blank' ); the_category(' '); // Separated by commas ?></p>
                        </div>
                        <h1>
                            <a class="eu-projects" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h1>
                        <p><?php the_field( 'news_text_with_image' ); ?></p>
                    </div>
					<div class="european_funds_items">
						<?php while ( have_rows( 'european_funds_items' ) ) : the_row(); ?>
							<h4><?php the_sub_field( 'european_funds_items_title' ); ?></h4>
							<p><?php the_sub_field( 'european_funds_items_text' ); ?></p>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php if ( have_rows( 'european_funds_icons' ) ) : ?>
					<div class="european_funds_icons">
						<?php while ( have_rows( 'european_funds_icons' ) ) : the_row(); ?>
						<?php
						$icons = get_sub_field('european_funds_icons__image');
						if( $icons ): ?>
							<?php $imageurl = wp_get_attachment_image_url($icons, 'full');?>
               				<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
						<?php endif; ?>
						<?php endwhile; ?>

						<?php $european_funds_link = get_field( 'european_funds_link' ); ?>
						<?php if ( $european_funds_link ) : ?>
							<a class="btn" href="<?php echo esc_url( $european_funds_link) ; ?>"><?php echo esc_html( $european_funds_link ); ?></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			<p class="text-under-image"><?php the_field( 'news_text_under_image' ); ?></p>
			<h3 class="heading-under-image"><?php the_field( 'news_heading' ); ?></h3>
			<p class="text-under-heading"><?php the_field( 'news_text_under_heading' ); ?></p>

			<img class="lazy lazy-loading garlic-img" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/garlic.png" alt="">

			<?php if ( have_rows( 'news_list' ) ) : ?>

				<ul class="news-blog-list">
					<?php while ( have_rows( 'news_list' ) ) : the_row(); ?>
						<li><?php the_sub_field( 'news_list_item' ); ?></li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>

			<h3 class="heading-under-image heading-under-image__video"><?php the_field( 'news_video_heading' ); ?></h3>
			<?php if ( 'news_video' ) : ?>
				<div class="news_video">
					<?php the_field( 'news_video' ); ?>
				</div>
			<?php endif; ?>

			<h3 class="heading-under-image heading-under-image__gallery"><?php the_field( 'news_gallery_heading' ); ?></h3>

			<?php
				$images = get_field('news_gallery');
				$size = 'full';
				if( $images ): ?>
					<div class="news_gallery">
						<?php foreach( $images as $image_id ): ?>
								<?php echo wp_get_attachment_image( $image_id, $size ); ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>


		<h3 class="heading-under-image heading-under-image__other-posts heading-with-icon">Inne wpisy</h3>

		<?php    $args = array(
			'posts_per_page' => 3,
			'offset' => 0,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => [$post->ID],
		);
		?>
		<div class="other-posts row desktop-flex">
			<?php
			$query = new WP_Query($args);
			if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post(); ?>
				<div class="other-posts-ctr">
				    <div class="post-thumbnail">
				        <a class="title-blog-posts" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'card-img-top')); ?></a>
				    </div>
				    <div class="entry-content">
						<span class="date"><?php the_time('F j Y'); ?></span>
						<a class="title-blog-posts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				        <p><?php the_field( 'news_lead' ); ?></p>
				        <a class="read-more-link-blog" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Czytaj więcej</a>
				    </div>
				</div>
			<?php
            endwhile;
            wp_reset_postdata();
			endif; ?>

		</div>

		<div><?php $other_post_link = get_field( 'other_post_link'); ?>
			<?php if ( $other_post_link ) : ?>
		      <a class="btn other-post-btn" href="<?php echo esc_url( $other_post_link) ; ?>">Więcej wpisów</a>
            <?php endif; ?>
        </div>

			<!-- <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?> -->


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
	</div>

	</section>
	<!-- /section -->
	</main>


<?php get_footer(); ?>

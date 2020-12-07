<section class="homepage-news">
    <img class="lazy lazy-loading tomato-homepage" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
    <div class="homepage-news__bg"></div>
    <div class="container">
        <h2 class="heading-with-icon">Aktualności</h2>
        <?php echo do_shortcode("[lastest-post]"); ?>

		<div><?php $other_post_link = get_field( 'other_post_link'); ?>
			<?php if ( $other_post_link ) : ?>
		      <a class="btn other-post-btn" href="<?php echo esc_url( $other_post_link) ; ?>">Więcej wpisów</a>
            <?php endif; ?>
        </div>

     </div>
</section>

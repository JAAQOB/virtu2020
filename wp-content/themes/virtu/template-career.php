<?php
/**
 * Template Name: Career Template
 */
get_header();

$careerPosts = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'career'
]);
?>
<section class="career-template">
    <img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">Kariera</h2>
        <?php the_breadcrumb(); ?>
    <div class="career__content">
    <?php
      foreach ($careerPosts as $i => $careerPosts): ?>
        <div class="career_posts_data">
            <h3><?php the_field( 'career_posts_heading', $careerPosts ); ?></h3>
            <div class="career__content__div">
            <p><?php the_field( 'career_posts_additional_text', $careerPosts ); ?></p>
                <a href="#">Czytaj więcej</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>

    <div class="career-template__contact contact-form-template">
          <img class="lazy lazy-loading rosemar" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
        <div class="container">
        <h3><?php the_field( 'career_page_contact_heading' ); ?></h3>
            <div class="ctr">
                <div class="col-md-6 col-md-6-padding">
                    <p><?php the_field( 'career_page_contact_text' ); ?></p>
                    <?php echo do_shortcode("[contact-form-7 id='5' title='Formularz 1']"); ?>
                </div>
                  <img class="lazy lazy-loading career-img-bg" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/career-img-bg.png" alt="">
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>

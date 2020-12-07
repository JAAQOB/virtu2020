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
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>
    <div class="career__content">
    <?php
      foreach ($careerPosts as $i => $careerPosts): ?>
        <h3><?php the_field( 'career_posts_heading', $careerPosts ); ?></h3>
            <?php if ( have_rows( 'career_posts_data', $careerPosts ) ) : ?>
                <?php while ( have_rows( 'career_posts_data', $careerPosts ) ) : the_row(); ?>
                    <h4><?php the_sub_field( 'career_posts_data_heading', $careerPosts ); ?></h4>
                       <?php if ( have_rows( 'career_posts_data_list', $careerPosts ) ) : ?>
                        <ul>
                            <?php while ( have_rows( 'career_posts_data_list', $careerPosts ) ) : the_row(); ?>
                                    <li><?php the_sub_field( 'career_posts_data_list_list_info', $careerPosts ); ?></li>
                            <?php endwhile; ?>
                         </ul>
                      <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    </div>
</section>



<?php get_footer(); ?>

<?php
/**
 * Template Name: Awards Template
 */
get_header();
?>
<section class="awards-template">
    <img class="lazy lazy-loading leaves" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>
    </div>
    <?php if ( have_rows( 'awards_see_more' ) ) : ?>
        <?php $i = 0; while ( have_rows( 'awards_see_more' ) ) : the_row(); ?>
            <div class="awards-content">
                <div class="container">
                    <div class="ctr">
                        <div class="awards-content__div">
                             <?php $image = get_sub_field( 'awards_see_more_image' ); ?>
                                <?php if ( $image ) :
                                    $imageurl = wp_get_attachment_image_url($image, 'full');?>
                                    <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                                <?php endif; ?>
                        </div>
                        <div class="awards-content__div awards-content__div--data">
                            <h3><?php the_sub_field( 'awards_see_more_heading' ); ?></h3>
                            <p><?php the_sub_field( 'awards_see_more_info' ); ?></p>
                        </div>
                    </div>
                </div>
                <?php if($i == 0){ ?>
                  <img class="lazy lazy-loading leaves-first" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
                <?php } else if($i == 5){?>
                    <img class="lazy lazy-loading garlic-middle" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/garlic.png" alt="">
                <?php } else if($i == 16){?>
                <img class="lazy lazy-loading rosemar-last" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
                <?php }  ?>
            </div>
        <?php $i++; endwhile; ?>
    <?php endif; ?>
</section>



<?php get_footer(); ?>

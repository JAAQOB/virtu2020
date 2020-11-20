<?php
/**
 * Template Name: Brands Template
 */
get_header();
?>
<section class="our-brands-template">
    <img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">Nasze marki</h2>
        <?php the_breadcrumb(); ?>
    </div>
        <div class="our-brands__info-section">
            <?php if ( have_rows( 'brands_virtu' ) ) : ?>
                <?php while ( have_rows( 'brands_virtu' ) ) : the_row(); ?>
                <div class="container">
                    <div class="our-brands__info-section__ctr">
                        <div class="our-brands__info-section__div col-md-8">
                                <?php $logo = get_sub_field( 'brands_logo' ); ?>
                                <?php if ( $logo ) :
                                    $imageurl = wp_get_attachment_image_url($logo, 'full');?>
                                    <img class="lazy lazy-loading logo-image" data-src="<?= $imageurl ?>" alt=""/>
                                <?php endif; ?>
                                <p><?php the_sub_field( 'brands_info' ); ?></p>
                                <?php $brands_link = get_sub_field( 'brands_link' ); ?>
                                <?php if ( $brands_link ) : ?>
                                    <a href="<?php echo esc_url( $brands_link) ; ?>">Poznaj asortyment</a>
                                <?php endif; ?>
                        </div>
                        <div class="our-brands__info-section__div col-md-4">
                            <?php $bigImage = get_sub_field( 'brands_big_image' ); ?>
                            <?php if ( $bigImage ) :
                                $imageurl = wp_get_attachment_image_url($bigImage, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="our-brands__info-section">
          <?php if ( have_rows( 'brands_food_house' ) ) : ?>
            <?php while ( have_rows( 'brands_food_house' ) ) : the_row(); ?>
            <div class="container">
                <div class="our-brands__info-section__ctr">
                    <div class="our-brands__info-section__div col-md-4">
                        <?php $bigImage = get_sub_field( 'brands_big_image' ); ?>
                        <?php if ( $bigImage ) :
                            $imageurl = wp_get_attachment_image_url($bigImage, 'full');?>
                            <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif; ?>
                    </div>
                    <div class="our-brands__info-section__div col-md-8">
                            <?php $logo = get_sub_field( 'brands_logo' ); ?>
                            <?php if ( $logo ) :
                                $imageurl = wp_get_attachment_image_url($logo, 'full');?>
                                <img class="lazy lazy-loading logo-image" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'brands_info' ); ?></p>
                            <?php $brands_link = get_sub_field( 'brands_link' ); ?>
                            <?php if ( $brands_link ) : ?>
                                <a href="<?php echo esc_url( $brands_link) ; ?>">Poznaj asortyment</a>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="our-brands__info-section">
         <?php if ( have_rows( 'brands_papa_luigi' ) ) : ?>
            <?php while ( have_rows( 'brands_papa_luigi' ) ) : the_row(); ?>
            <div class="container">
                <div class="our-brands__info-section__ctr">
                    <div class="our-brands__info-section__div col-md-8">
                            <?php $logo = get_sub_field( 'brands_logo' ); ?>
                            <?php if ( $logo ) :
                                $imageurl = wp_get_attachment_image_url($logo, 'full');?>
                                <img class="lazy lazy-loading logo-image" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'brands_info' ); ?></p>
                            <?php $brands_link = get_sub_field( 'brands_link' ); ?>
                            <?php if ( $brands_link ) : ?>
                                <a href="<?php echo esc_url( $brands_link) ; ?>">Poznaj asortyment</a>
                            <?php endif; ?>
                    </div>
                    <div class="our-brands__info-section__div col-md-4">
                        <?php $bigImage = get_sub_field( 'brands_big_image' ); ?>
                        <?php if ( $bigImage ) :
                            $imageurl = wp_get_attachment_image_url($bigImage, 'full');?>
                            <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="our-brands__info-section">
            <?php if ( have_rows( 'brands_preferita' ) ) : ?>
                <?php while ( have_rows( 'brands_preferita' ) ) : the_row(); ?>
                <div class="container">
                    <div class="our-brands__info-section__ctr">
                        <div class="our-brands__info-section__div col-md-4">
                            <?php $bigImage = get_sub_field( 'brands_big_image' ); ?>
                            <?php if ( $bigImage ) :
                                $imageurl = wp_get_attachment_image_url($bigImage, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                        </div>
                        <div class="our-brands__info-section__div col-md-8">
                                <?php $logo = get_sub_field( 'brands_logo' ); ?>
                                <?php if ( $logo ) :
                                    $imageurl = wp_get_attachment_image_url($logo, 'full');?>
                                    <img class="lazy lazy-loading logo-image" data-src="<?= $imageurl ?>" alt=""/>
                                <?php endif; ?>
                                <p><?php the_sub_field( 'brands_info' ); ?></p>
                                <?php $brands_link = get_sub_field( 'brands_link' ); ?>
                                <?php if ( $brands_link ) : ?>
                                    <a href="<?php echo esc_url( $brands_link) ; ?>">Poznaj asortyment</a>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="our-brands__info-section">
            <?php if ( have_rows( 'brands_helenki' ) ) : ?>
                <?php while ( have_rows( 'brands_helenki' ) ) : the_row(); ?>
                <div class="container">
                    <div class="our-brands__info-section__ctr">
                        <div class="our-brands__info-section__div col-md-8">
                                <?php $logo = get_sub_field( 'brands_logo' ); ?>
                                <?php if ( $logo ) :
                                    $imageurl = wp_get_attachment_image_url($logo, 'full');?>
                                    <img class="lazy lazy-loading logo-image" data-src="<?= $imageurl ?>" alt=""/>
                                <?php endif; ?>
                                <p><?php the_sub_field( 'brands_info' ); ?></p>
                                <?php $brands_link = get_sub_field( 'brands_link' ); ?>
                                <?php if ( $brands_link ) : ?>
                                    <a href="<?php echo esc_url( $brands_link) ; ?>">Poznaj asortyment</a>
                                <?php endif; ?>
                        </div>
                        <div class="our-brands__info-section__div col-md-4">
                            <?php $bigImage = get_sub_field( 'brands_big_image' ); ?>
                            <?php if ( $bigImage ) :
                                $imageurl = wp_get_attachment_image_url($bigImage, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>


        <?php if ( have_rows( 'brands_why_our_products' ) ) : ?>
            <?php while ( have_rows( 'brands_why_our_products' ) ) : the_row(); ?>
            <div class="our-products-brands">
                <div class="container">
                    <h2 class="heading-with-icon"><?php the_sub_field( 'brands_why_our_products_main_text' ); ?></h2>
                    <div class="brands_why_our_products">
                        <div class="brands_why_our_products__div">
                            <?php $icon1 = get_sub_field( 'brands_why_our_products_icon_1' ); ?>
                            <?php if ( $icon1 ) :
                                $imageurl = wp_get_attachment_image_url($icon1, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                           <p><?php the_sub_field( 'brands_why_our_products_heading_1' ); ?></p>
                        </div>
                        <div class="brands_why_our_products__div">
                            <?php $icon2 = get_sub_field( 'brands_why_our_products_icon_2' ); ?>
                            <?php if ( $icon2 ) :
                                $imageurl = wp_get_attachment_image_url($icon2, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'brands_why_our_products_heading_2' ); ?></p>
                        </div>
                        <div class="brands_why_our_products__div">
                            <?php $icon3 = get_sub_field( 'brands_why_our_products_icon_3' ); ?>
                            <?php if ( $icon3 ) :
                                $imageurl = wp_get_attachment_image_url($icon3, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'brands_why_our_products_heading_3' ); ?></p>
                        </div>
                    </div>
                    <?php $brands_why_our_products_link = get_sub_field( 'brands_why_our_products_link' ); ?>
                    <?php if ( $brands_why_our_products_link ) : ?>
                        <a class="btn" href="<?php echo esc_url( $brands_why_our_products_link) ; ?>">Poznaj nasze produkty</a>
                    <?php endif; ?>
                </div>
                <img class="lazy lazy-loading rosemar" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
</section>



<?php get_footer(); ?>

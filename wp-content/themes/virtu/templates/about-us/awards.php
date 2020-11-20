<section class="about-us-awards">
    <img class="lazy lazy-loading tomato-about" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
    <div class="container">
        <?php if ( have_rows( 'awards' ) ) : ?>
            <?php while ( have_rows( 'awards' ) ) : the_row(); ?>
                <h2 class="heading-with-icon"><?php the_sub_field( 'about_us_awards_main_text' ); ?></h2>
                <div class="about-us-awards__ctr">
                    <div class="icon-section">
                            <?php $image1 = get_sub_field( 'about_us_awards_image_1' ); ?>
                                <?php if ( $image1 ) :
                                $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <div class="icon-section--data">
                                <h6><?php the_sub_field( 'about_us_awards_heading_1' ); ?></h6>
                                <p><?php the_sub_field( 'about_us_awards_year_1' ); ?></p>
                            </div>
                    </div>
                    <div class="icon-section">
                            <?php $image2 = get_sub_field( 'about_us_awards_image_2' ); ?>
                                <?php if ( $image2 ) :
                                $imageurl = wp_get_attachment_image_url($image2, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <div class="icon-section--data">
                                <h6><?php the_sub_field( 'about_us_awards_heading_2' ); ?></h6>
                                <p><?php the_sub_field( 'about_us_awards_year_2' ); ?></p>
                            </div>
                    </div>
                    <div class="icon-section">
                            <?php $image3 = get_sub_field( 'about_us_awards_image_3' ); ?>
                                <?php if ( $image3 ) :
                                $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <div class="icon-section--data">
                                <h6><?php the_sub_field( 'about_us_awards_heading_3' ); ?></h6>
                                <p><?php the_sub_field( 'about_us_awards_year_3' ); ?></p>
                            </div>
                    </div>
                </div>

                <?php $about_us_awards_link = get_sub_field( 'about_us_awards_link' ); ?>
                <?php if ( $about_us_awards_link ) : ?>
                    <a class="btn" href="<?php echo esc_url( $about_us_awards_link) ; ?>">Zobacz wszystkie</a>
                <?php endif; ?>
                    <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<section class="about-us-support">
    <img class="lazy lazy-loading leaves-about" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
    <div class="container">
        <?php if ( have_rows( 'about_us_support' ) ) : ?>
            <?php while ( have_rows( 'about_us_support' ) ) : the_row(); ?>
                <h3><?php the_sub_field( 'about_us_support_heading' ); ?></h3>
                <div class="about-us-support__ctr">
                    <div class="icon-section">
                            <?php $image1 = get_sub_field( 'about_us_support_icon_1' ); ?>
                                <?php if ( $image1 ) :
                                $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_support_text_1' ); ?></p>
                    </div>
                    <div class="icon-section">
                            <?php $image2 = get_sub_field( 'about_us_support_icon_2' ); ?>
                                <?php if ( $image2 ) :
                                $imageurl = wp_get_attachment_image_url($image2, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_support_text_2' ); ?></p>
                    </div>
                    <div class="icon-section">
                            <?php $image3 = get_sub_field( 'about_us_support_icon_3' ); ?>
                                <?php if ( $image3 ) :
                                $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_support_text_3' ); ?></p>
                    </div>
                    <div class="icon-section">
                            <?php $image4 = get_sub_field( 'about_us_support_icon_4' ); ?>
                                <?php if ( $image4 ) :
                                $imageurl = wp_get_attachment_image_url($image4, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_support_text_4' ); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

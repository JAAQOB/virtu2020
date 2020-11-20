<section class="homepage-secret">
    <img class="lazy lazy-loading leaf-homepage-top" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
    <?php if ( have_rows( 'secret_features' ) ) : ?>
        <?php while ( have_rows( 'secret_features' ) ) : the_row(); ?>
            <div class="container">
            <h2 class="heading-with-icon"><?php the_field( 'secret_heading' ); ?></h2>
                <div class="row">
                    <div class="secret_div ">
                       <?php $image1 = get_sub_field( 'secret_features_img_1' );
                        if ( $image1 ) :
                              $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                            <img class="lazy lazy-loading map-image" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif;?>
                        <p><?php the_sub_field( 'secret_features_text_1' ); ?></p>
                    </div>
                    <div class="secret_div ">
                      <?php $image2 = get_sub_field( 'secret_features_img_2' );
                        if ( $image2 ) :
                              $imageurl = wp_get_attachment_image_url($image2, 'full');?>
                            <img class="lazy lazy-loading map-image" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif;?>
                        <p><?php the_sub_field( 'secret_features_text_2' ); ?></p>
                    </div>
                    <div class="secret_div ">
                     <?php $image3 = get_sub_field( 'secret_features_img_3' );
                        if ( $image3 ) :
                              $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                            <img class="lazy lazy-loading map-image" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif;?>
                        <p><?php the_sub_field( 'secret_features_text_3' ); ?></p>
                    </div>
                    <div class="secret_div ">
                     <?php $image4 = get_sub_field( 'secret_features_img_4' );
                        if ( $image4 ) :
                              $imageurl = wp_get_attachment_image_url($image4, 'full');?>
                            <img class="lazy lazy-loading map-image" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif;?>
                        <p><?php the_sub_field( 'secret_features_text_4' ); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
     <?php endif; ?>
</section>

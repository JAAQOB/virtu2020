<section class="about-us-certificates">
    <div class="container">
        <?php if ( have_rows( 'certificates' ) ) : ?>
            <?php while ( have_rows( 'certificates' ) ) : the_row(); ?>
                <h2 class="heading-with-icon"><?php the_sub_field( 'about_us_certificates_main_text' ); ?></h2>
                <div class="about-us-certificates__ctr">
                    <div class="icon-section">
                        <?php $image1 = get_sub_field( 'about_us_certificates_image_1' ); ?>
                            <?php if ( $image1 ) :
                            $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                            <img id="image-1" data-id="image-1" class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif; ?>
                        <p><?php the_sub_field( 'about_us_certificates_text_1' ); ?></p>
                    </div>
                    <div class="icon-section">
                        <?php $image2 = get_sub_field( 'about_us_certificates_image_2' ); ?>
                            <?php if ( $image2 ) :
                            $imageurl = wp_get_attachment_image_url($image2, 'full');?>
                            <img id="image-2" data-id="image-2" class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif; ?>
                        <p><?php the_sub_field( 'about_us_certificates_text_2' ); ?></p>
                    </div>
                    <div class="icon-section">
                        <?php $image3 = get_sub_field( 'about_us_certificates_image_3' ); ?>
                            <?php if ( $image3 ) :
                            $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                            <img id="image-3" data-id="image-3" class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        <?php endif; ?>
                        <p><?php the_sub_field( 'about_us_certificates_text_3' ); ?></p>
                    </div>
                </div>
                <a class="btn" href="">Zobacz wszystkie</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</section>

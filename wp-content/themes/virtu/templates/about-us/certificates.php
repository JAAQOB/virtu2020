<section class="about-us-certificates">
    <div class="container">
        <?php if ( have_rows( 'certificates' ) ) : ?>
            <?php while ( have_rows( 'certificates' ) ) : the_row(); ?>
                <h2 class="heading-with-icon"><?php the_sub_field( 'about_us_certificates_main_text' ); ?></h2>
                <div class="about-us-certificates__ctr">
                    <div class="icon-section">
                        <a href="#">
                            <?php $image1 = get_sub_field( 'about_us_certificates_image_1' ); ?>
                                <?php if ( $image1 ) :
                                $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_certificates_text_1' ); ?></p>
                        </a>
                    </div>
                    <div class="icon-section">
                        <a href="#">
                            <?php $image2 = get_sub_field( 'about_us_certificates_image_2' ); ?>
                                <?php if ( $image2 ) :
                                $imageurl = wp_get_attachment_image_url($image2, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_certificates_text_2' ); ?></p>
                        </a>
                    </div>
                    <div class="icon-section">
                        <a href="#">
                            <?php $image3 = get_sub_field( 'about_us_certificates_image_3' ); ?>
                                <?php if ( $image3 ) :
                                $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                            <?php endif; ?>
                            <p><?php the_sub_field( 'about_us_certificates_text_3' ); ?></p>
                        </a>
                    </div>
                </div>
                <a class="btn" href="">Zobacz wszystkie</a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

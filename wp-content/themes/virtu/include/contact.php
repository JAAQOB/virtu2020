
<section class="contact-form-template">
    <div class="contact-form-template_cont container">
        <div class="row">
            <div class="contact-form-template__div col-md-6 contact-form-template__div__data">

            <?php if ( have_rows( 'contact_data' ) ) : ?>
	            <?php while ( have_rows( 'contact_data' ) ) : the_row(); ?>
                <h3><?php the_sub_field( 'about_us_contact_data_headign' ); ?></h3>
                <p><?php the_sub_field( 'about_us_contact_data_small_headign' ); ?></p>
                <h6><?php the_sub_field( 'about_us_contact_data_company' ); ?></h6>
                <a href="mailto:biuro@virtu.com.pl"><?php the_sub_field( 'about_us_contact_data_email' ); ?></a>
                <a href="tel:+48 32 671 81 21"><?php the_sub_field( 'about_us_contact_data_tel' ); ?></a>
                <div class="social-icons">
                    <span>Bądź na bieżąco</span>
                    <a href="https://www.facebook.com/virtuozismaku/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/social/facebook.svg" alt=""></a>
                    <a href="https://www.instagram.com/virtuozi_smaku/" target="_blank"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/social/instagram.svg" alt=""></a>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>

            <div class="contact-form-template__div col-md-6">
                <div class="contact-form-template__div">
                    <?php echo do_shortcode( '[contact-form-7 id="5" title="Formularz 1"]' );?>
                </div>
            </div>
        </div>
    </div>
    <img class="lazy lazy-loading rosemar-img" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
</section>
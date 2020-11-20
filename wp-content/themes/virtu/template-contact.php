<?php
/**
 * Template Name: Kontakt Template
 */
get_header();
?>
<section class="contact-form-template">
    <img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">Kontakt</h2>
        <?php the_breadcrumb(); ?>
    </div>

    <div class="contact-form-template_cont container contact-page">
        <div class="row">
            <div class="contact-form-template__div col-md-4 contact-form-template__div__data">

            <?php if ( have_rows( 'contact_form' ) ) : ?>
	            <?php while ( have_rows( 'contact_form' ) ) : the_row(); ?>
                <h3><?php the_sub_field( 'contact_form_main_text' ); ?></h3>
                <h6><?php the_sub_field( 'contact_form_company' ); ?></h6>
                <span><?php the_sub_field( 'contact_form_adress' ); ?></span>
                <span><?php the_sub_field( 'contact_form_nip' ); ?></span>

                <a class="contact-a-email" href="mailto:biuro@virtu.com.pl"><?php the_sub_field( 'contact_form_email' ); ?></a>
                <a href="tel:+48 32 671 81 21"><?php the_sub_field( 'contact_form_tel' ); ?></a>
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
        <div class="complaint__content">
            <h3><?php the_field( 'contact_form_complaint_main_text' ); ?></h3>
            <p><?php the_field( 'contact_form_complaint_text' ); ?></p>
            <?php $contact_form_complaint_main_link = get_field( 'contact_form_complaint_main_link' ); ?>
            <?php if ( $contact_form_complaint_main_link ) : ?>
                <p><a class="btn" href="<?php echo esc_url( $contact_form_complaint_main_link) ; ?>">Zgłoś reklamację</a></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="contact__map">
        <img class="lazy lazy-loading garlic-img" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/garlic.png" alt="">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2538.065870620094!2d19.45189515152841!3d50.495731791881006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471723ae086a5e7b%3A0x9be7c4ec7606c29e!2s%C5%81o%C5%9Bnicka%2035%2C%2042-400%20Zawiercie!5e0!3m2!1spl!2spl!4v1605830845835!5m2!1spl!2spl" width="600" height="540" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <img class="lazy lazy-loading rosemar-img" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
    </div>
</section>



<?php get_footer(); ?>

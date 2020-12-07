<?php
/**
 * Template Name: Contact Report Template
 */
get_header();
?>

<section class="contact-report-form-template">
    <img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">Zgłoś Rekklamację do działu jakości</h2>
        <?php the_breadcrumb(); ?>

    <div class="contact-report-form-template_cont">
        <div class="contact-report-form-template__div">
            <div class="contact-form-template__div">
                <?php echo do_shortcode( '[contact-form-7 id="495" title="Report"]' );?>
            </div>
        </div>
    </div>
    <img class="lazy lazy-loading rosemar" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">

</section>



<?php get_footer(); ?>

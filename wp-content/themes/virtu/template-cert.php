<?php
/**
 * Template Name: Cert Template
 */
get_header();
?>
<section class="certificate-section">
    <img class="lazy lazy-loading pepper-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pepper.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>
        <p class="certificate_information"></p><?php the_field( 'certificate_information' ); ?></p>

        <?php if ( have_rows( 'certificate_list' ) ) : ?>
            <ul>
                <?php while ( have_rows( 'certificate_list' ) ) : the_row(); ?>
                    <li><?php the_sub_field( 'certificate_list_item' ); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

       <p><?php the_field( 'certificate_last_text' ); ?></p>
       <h3><?php the_field( 'heading' ); ?></h3>

       <?php if ( have_rows( 'certificate_list_of_certificate' ) ) : ?>
           <div class="certificate_list_of_certificate">
            <div class="icon-section">
                <?php $i=1; while ( have_rows( 'certificate_list_of_certificate' ) ) : the_row(); ?>
                <?php $image = get_sub_field( 'certificate_list_of_certificate_item' ); ?>
                    <?php if ( $image ) : ?>
                        <?php $url = wp_get_attachment_url( $image ); ?>
                            <img id="image-<?php echo $i ?>" data-id="image-<?php echo $i ?>" class="lazy lazy-loading" data-src="<?= $url ?>" alt="">
                    <?php endif; ?>
                        <p><?php the_sub_field( 'about_us_certificates_text_3' ); ?></p>
                <?php $i++; endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</section>
<?php get_footer(); ?>

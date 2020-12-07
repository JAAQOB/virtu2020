<?php
/**
 * Template Name: Privacy Policy Template
 */
get_header(); ?>

<section class="privacy-policy-section">
    <img class="lazy lazy-loading leaves" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <img class="lazy lazy-loading basil" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/basil.png" alt="">
    <img class="lazy lazy-loading garlic" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/garlic.png" alt="">

    <div class="container">
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>
        <?php if ( have_rows( 'privacy_policy_items' ) ) : ?>
            <div class="privacy_policy_items">
            <?php while ( have_rows( 'privacy_policy_items' ) ) : the_row(); ?>
                    <h3><?php the_sub_field( 'privacy_policy_items_heading' ); ?></h3>
                    <p><?php the_sub_field( 'privacy_policy_items_text' ); ?></p>
                <?php if ( have_rows( 'privacy_policy_items_list' ) ) : ?>
                <ul>
                    <?php while ( have_rows( 'privacy_policy_items_list' ) ) : the_row(); ?>
                        <li><?php the_sub_field( 'privacy_policy_items_list_items' ); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php endwhile; ?>
            </div>
        <?php endif; ?>

    <?php if ( have_rows( 'privacy_policy_files' ) ) : ?>
    <h3 class="h3_privacy_policy_files"><?php the_field( 'privacy_policy_files_download_files_hading' ); ?></h3>
    <div class="privacy_policy_files">
       <div class="row">
            <?php while ( have_rows( 'privacy_policy_files' ) ) : the_row(); ?>
            <div class="privacy_policy_files--div">
                <?php $privacy_policy_files_inp = get_sub_field( 'privacy_policy_files_inp' ); ?>
                    <?php if ( $privacy_policy_files_inp ) : ?>
                        <?php $url = wp_get_attachment_url( $privacy_policy_files_inp ); ?>
                        <a target="_blank" href="<?php echo esc_url( $url ); ?>">
                            <img class="lazy lazy-loading download" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="">
                            <h3><?php the_sub_field( 'privacy_policy_files_heading' ); ?></h3>
                        </a>
                    <?php endif; ?>
                <p><?php the_sub_field( 'privacy_policy_files_text' ); ?></p>
        </div>
        <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>

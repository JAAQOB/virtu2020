<?php
/**
 * Template Name: Where Buy Template
 */
get_header();
?>
<section class="where-buy-template">
    <img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">Gdzie kupić</h2>
        <?php the_breadcrumb(); ?>

        <p><?php the_field( 'where_buy_info' ); ?></p>
        <?php if ( have_rows( 'where_buy_logos' ) ) : ?>
            <div class="where_buy_logos">
                <?php while ( have_rows( 'where_buy_logos' ) ) : the_row(); ?>
                    <?php $image = get_sub_field( 'where_buy_logos_brand_logo' ); ?>
                        <?php if ( $image ) :
                        $imageurl = wp_get_attachment_image_url($image, 'full');?>
                        <div class="where_buy_logos__div">
                            <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
           </div>
        <?php endif; ?>

        <div class="where-buy-template__last-section">
            <div class="ctr">
                <div class="ctr__div">
                    <?php $image = get_field( 'where_buy_lead_img_1' ); ?>
                        <?php if ( $image ) :
                        $imageurl = wp_get_attachment_image_url($image, 'full');?>
                        <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                    <?php endif; ?>

                    <?php $where_buy_lead_link_1 = get_field( 'where_buy_lead_link_1' ); ?>
                    <?php if ( $where_buy_lead_link_1 ) : ?>
                        <p>Poznaj szeroką gamę naszych  <a href="<?php echo esc_url( $where_buy_lead_link_1) ; ?>">produktów</a></p>
                    <?php endif; ?>
                </div>
                <div class="ctr__div">
                    <?php $image = get_field( 'where_buy_lead_img_2' ); ?>
                        <?php if ( $image ) :
                        $imageurl = wp_get_attachment_image_url($image, 'full');?>
                        <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                    <?php endif; ?>

                    <?php $where_buy_lead_link_2 = get_field( 'where_buy_lead_link_2' ); ?>
                    <?php if ( $where_buy_lead_link_2 ) : ?>
                        <p>Najlepsze <a href="<?php echo esc_url( $where_buy_lead_link_2) ; ?>">przepisy</a> specjalnie dla Ciebie</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <img class="lazy lazy-loading rosemar" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">

</section>

<?php get_footer(); ?>

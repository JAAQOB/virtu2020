<section class="homepage-where-buy">
    <img class="lazy lazy-loading where-buy-homepage" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/rosemar.png" alt="">
    <?php if ( have_rows( 'secret_features' ) ) : ?>
        <?php while ( have_rows( 'secret_features' ) ) : the_row(); ?>
            <div class="container">
            <div class="div-h2">
                 <h2 class="heading-with-icon">Gdzie kupić?</h2>
            </div>
                <div class="row">
                    <?php if ( have_rows( 'where_buy_logos', 28 ) ) : ?>
                        <div class="where_buy_logos">
                        <?php $counter = 0; ?>
                            <?php while ( have_rows( 'where_buy_logos', 28 ) ) : the_row();
                            $counter++;
                            if ($counter > 6):
                              break;
                            endif;
                                 $image = get_sub_field( 'where_buy_logos_brand_logo', 28 ); ?>
                                    <?php if ( $image ) :
                                    $imageurl = wp_get_attachment_image_url($image, 'full');?>
                                    <div class="where_buy_logos__div">
                                        <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                                    </div>
                                <?php endif;
                                continue; ?>
                            <?php endwhile; ?>
                        </div>
                     <?php $where_buy_link = get_field( 'where_buy_link' ); ?>
                        <?php if ( $where_buy_link ) : ?>
                            <div class="btn-div">
                               <a class="btn" href="<?php echo esc_url( $where_buy_link) ; ?>">Zobacz wszystkie</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
     <?php endif; ?>
</section>

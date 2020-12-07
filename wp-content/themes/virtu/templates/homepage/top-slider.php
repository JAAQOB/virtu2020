<section class="homepage-top-slider">
    <?php if ( have_rows( 'homepege_top_slider_slides' ) ) : ?>
        <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php while ( have_rows( 'homepege_top_slider_slides' ) ) : the_row(); ?>
                    <div class="swiper-slide"
                            style="background-image: url(<?php if ( get_sub_field( 'homepege_top_slider_image' ) ) {  the_sub_field( 'homepege_top_slider_image' ); } ?>)">
                            <div class="container">
                                <div class="slide-content-wrapper">
                                    <h1 class="slide-header"><?php echo the_sub_field( 'homepege_top_slider_title' ); ?></h1>
                                    <?php $homepege_top_slider_read_more = get_sub_field( 'homepege_top_slider_read_more' ); ?>
                                </div>
                                <div class="scroll-down"><a href="#scroll-down"><img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/slider/scroll-icon.svg" alt=""></a></div>
                            </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php while ( have_rows( 'homepege_top_slider_slides' ) ) : the_row(); ?>
            <div class="slider-down-box-content">
                <div class="ctr">
                    <div class="slider-down-box-content__div">
                        <img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/slider/slider-img-1.png" alt="">
                        <?php $link1 = get_sub_field( 'homepege_top_slider_link_down_1' ); ?>
                            <?php if ( $link1 ) : ?>
                                <p>Poznaj szeroką gamę naszych <a href="<?php echo esc_url( $link1) ; ?>">produktów</a></p>
                            <?php endif; ?>
                    </div>
                    <div class="slider-down-box-content__div">
                        <img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/slider/pizza.png" alt="">
                        <?php $link2 = get_sub_field( 'homepege_top_slider_link_down_2' ); ?>
                            <?php if ( $link2 ) : ?>
                                <p>Najlepsze <a href="<?php echo esc_url( $link1) ; ?>">przepisy</a> specjalnie dla Ciebie</p>
                            <?php endif; ?>
                    </div>
                    <div class="slider-down-box-content__div">
                        <img class="lazy lazy-loading" data-src="<?php echo get_template_directory_uri(); ?>/img/slider/bag-logo.png" alt="">
                        <?php $link3 = get_sub_field( 'homepege_top_slider_link_down_3' ); ?>
                            <?php if ( $link3 ) : ?>
                                <p>Dowiedz się <a href="<?php echo esc_url( $link3) ; ?>">gdzie kupić</a> nasze pyszne dania</p>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- Add Arrows -->
            <div class="swiper-navigation">
                <div class="swiper-navigation__wrapper">
                <div class="swiper-button-prev-custom"><i class="fas fa-angle-left"></i></div>
                <div class="swiper-button-next-custom"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
             <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
        </div>
     <?php endif; ?>
</section>

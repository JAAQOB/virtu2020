<section class="about-us-template">
    <img class="lazy lazy-loading leaves-about" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2">O nas</h2>
        <?php the_breadcrumb(); ?>
    </div>
    <div class="first-section">
         <div class="first-section__div first-section__div--text">
            <span>1992</span>
            <h3><?php the_field( 'about_us_history_element_heading_1' ); ?></h3>
            <p><?php the_field( 'about_us_history_element_text_1' ); ?></p>
        </div>
        <div class="first-section__div">
            <?php $image1 = get_field( 'about_us_history_element_image_1' ); ?>
            <?php if ( $image1 ) :
                $imageurl = wp_get_attachment_image_url($image1, 'full');?>
                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
            <?php endif; ?>
            <div class="first-section__div__bg-color"></div>
        </div>
    </div>
    <div class="first-section">
         <div class="first-section__div">
            <div class="video-top">
                <?php the_field( 'about_us_history_element_image_2' ); ?>
            </div>
            <div class="first-section__div__bg-color"></div>
        </div>
        <div class="first-section__div first-section__div--text">
            <span>1998</span>
            <h3><?php the_field( 'about_us_history_element_heading_2' ); ?></h3>
            <p><?php the_field( 'about_us_history_element_text_2' ); ?></p>
        </div>
    </div>
    <div class="first-section">
         <div class="first-section__div first-section__div--text">
            <h3><?php the_field( 'about_us_history_element_heading_3' ); ?></h3>
            <p><?php the_field( 'about_us_history_element_text_3' ); ?></p>
        </div>
        <div class="first-section__div">
            <?php $image3 = get_field( 'about_us_history_element_image_3' ); ?>
            <?php if ( $image3 ) :
                $imageurl = wp_get_attachment_image_url($image3, 'full');?>
                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
            <?php endif; ?>
            <div class="first-section__div__bg-color"></div>
        </div>
    </div>
    <div class="first-section">
         <div class="first-section__div first-section__div--text">
             <div class="heading-img">
                <span>2018</span>
                <h3><?php the_field( 'about_us_history_element_heading_4' ); ?></h3>
            </div>
            <p><?php the_field( 'about_us_history_element_text_4' ); ?></p>
        </div>
        <div class="first-section__div">
        <div class="video-top">
                <?php the_field( 'about_us_history_element_image_4' ); ?>
            </div>
        </div>
    </div>
    <div class="first-section">
         <div class="first-section__div">
            <?php $image5 = get_field( 'about_us_history_element_image_5' ); ?>
            <?php if ( $image5 ) :
                $imageurl = wp_get_attachment_image_url($image5, 'full');?>
                <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
            <?php endif; ?>
        </div>
        <div class="first-section__div first-section__div--text">
            <h3><?php the_field( 'about_us_history_element_heading_5' ); ?></h3>
            <p><?php the_field( 'about_us_history_element_text_5' ); ?></p>
        </div>
    </div>
</section>

<?php
/**
 * Template Name: Recipes Template
 */
get_header();

$recipes = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'recipes'
]);




?>
<section class="recipes-template">
    <img class="lazy lazy-loading pepper-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pepper.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>

        <div class="recipes-template___ctr">
        <?php
        foreach ($recipes as $i => $recipes):
            $currentLink = get_permalink($recipes);
        ?>
            <div class="recipes__content col-md-4">
                <a href="<?= get_permalink($recipes) ?>">
                    <?php
                    $imageId = get_field('product_options_thumb', $recipes);
                    $icon = false;
                    if ($imageId):
                        $image = wp_get_attachment_image_url($imageId, $icon);
                        ?>
                        <div class="thumb-item-wrapper">
                            <img class="lazy lazy-loading" data-src="<?= $image ?>" alt="">
                            <?php
                                $product_options_extra_label =  get_field('product_options_extra_label', $recipes);
                                if ($product_options_extra_label): ?>
                                <span><?php the_field( 'product_options_extra_label', $recipes ); ?></span>
                            <?php endif; ?>
                            <h3><?php echo $recipes->post_title ?></h3>
                        </div>
                    <?php endif; ?>

                <p><?php the_field( 'products_lead', $recipes ); ?></p>
                <a class="read-more-btn" href="<?php echo $currentLink ?>">Czytaj więcej</a>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>


</section>



<?php get_footer(); ?>

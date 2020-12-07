<?php
/**
 * Template Name: Products Template
 */
get_header();

$products = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'products'
]);

$product_types = get_terms(
    array(
        'taxonomy'   => 'product_types',
        'hide_empty' => false,
    )
);

$product_dish_types = get_terms(
    array(
        'taxonomy'   => 'product_dish_type',
        'hide_empty' => false,
    )
);

$product_categories = get_terms(
    array(
        'taxonomy'   => 'product_categories',
        'hide_empty' => false,
    )
);


$product_occasions = get_terms(
    array(
        'taxonomy'   => 'product_occasions',
        'hide_empty' => false,
    )
);

?>
<section class="product-template">
    <img class="lazy lazy-loading pepper-icon" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pepper.png" alt="">
    <div class="container">
        <h2 class="breadcrumbs__h2"><?php the_title(); ?></h2>
        <?php the_breadcrumb(); ?>

        <div class="product-template__filters-wrapper">
            <div class="product-template__filters">
                <span class="product-template__filters--toggle"><?php pll_e('Filtry'); ?></span>
                <span class="product-template__filters--clear"><?php pll_e('Wyczyść wszystkie filtry'); ?></span>
            </div>
            <div class="product-template__filters-">

            </div>
        </div>
        <div id="product-template__filters-ctr" class="product-template__filters-ctr">
            <div class="product-template__filters-ctr--all-in-div">
                <span><?php pll_e('Rodzaj'); ?> </span>
                <div class="product-template__filters-ctr--all-in-div--foreach">
                <?php
                    foreach($product_types as $product_type){
                        echo '<label><input class="product-template__filters-input" type="checkbox" name="product_types" value="'. $product_type->slug.'"><p>'.$product_type->name .'</p></label>';
                    }
                ?>
                </div>
            </div>
            <div class="product-template__filters-ctr--all-in-div">
                <span><?php pll_e('Typ dania'); ?> </span>
                <div class="product-template__filters-ctr--all-in-div--foreach">
                <?php
                    foreach($product_dish_types as $product_dish_type){
                        echo '<label><input class="product-template__filters-input" type="checkbox" name="product_dish_type" value="'. $product_dish_type->slug.'" ><p>'.$product_dish_type->name .'</p></label>';
                    }
                ?>
                </div>
            </div>
            <div class="product-template__filters-ctr--all-in-div">
                <span><?php pll_e('Kategorie'); ?> </span>
                <div class="product-template__filters-ctr--all-in-div--foreach">
                <?php
                    foreach($product_categories as $product_category){
                        echo '<label><input class="product-template__filters-input" type="checkbox" name="product_categories" value="'. $product_category->slug.'" ><p>'.$product_category->name .'</p></label>';
                    }
                ?>
                </div>
            </div>
            <div class="product-template__filters-ctr--all-in-div">
                <span><?php pll_e('Okazje'); ?> </span>
                <div class="product-template__filters-ctr--all-in-div--foreach">
                <?php
                    foreach($product_occasions as $product_occasion){
                        echo '<label><input class="product-template__filters-input" type="checkbox" name="product_occasions" value="'. $product_occasion->slug.'" ><p>'.$product_occasion->name .'</p></label>';
                    }
                ?>
                </div>
            </div>
            <div>
                <span><?php pll_e('Inne'); ?> </span>
                <div class="">
                    <label><input class="product-template__filters-input" type="checkbox" name="product_calorie" value=""><?php pll_e('Wartość kaloryczna'); ?></label>
                    <div class="middle">
                        <div class="multi-range-slider">
                            <input type="range" class="product-template__filters-input" id="input-product_calorie-left" min="0" max="5000" step="500" value="0">
                            <input type="range" class="product-template__filters-input" id="input-product_calorie-right" min="0" max="5000" step="500" value="5000">

                            <div class="slider">
                                <div class="track"></div>
                                <div class="range"></div>
                                <div class="thumb left"><span class="slider__thumb-left-value"></span></div>
                                <div class="thumb right"><span class="slider__thumb-right-value"></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="product-template___ctr">
        <?php
        foreach ($products as $i => $products):
            $currentLink = get_permalink($products);
        ?>
            <div class="product__content">
                <a href="<?= get_permalink($products) ?>">
                    <?php
                    $imageId = get_field('product_options_thumb', $products);
                    $icon = false;
                    if ($imageId):
                        $image = wp_get_attachment_image_url($imageId, $icon);
                        ?>
                        <div class="thumb-item-wrapper">
                            <img class="lazy lazy-loading" data-src="<?= $image ?>" alt="">

                            <?php
                                $product_options_extra_label =  get_field('product_options_extra_label', $products);
                                if ($product_options_extra_label): ?>
                                <span><?php the_field( 'product_options_extra_label', $products ); ?></span>
                                <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <h3><?php echo $products->post_title ?></h3>

                <p><?php the_field( 'products_lead', $products ); ?></p>
                <a class="read-more-btn" href="<?php echo $currentLink ?>">Czytaj więcej</a>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>


</section>

<style>
    .middle {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin-top: 16px;
    }

    .slider {
        position: relative;
        z-index: 1;
        height: 10px;
        margin: 0 15px;
    }
    .slider > .track {
        position: absolute;
        z-index: 1;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        border-radius: 5px;
        background-color: #c6aee7;
    }
    .slider > .range {
        position: absolute;
        z-index: 2;
        left: 25%;
        right: 25%;
        top: 0;
        bottom: 0;
        border-radius: 5px;
        background-color: #6200ee;
    }
    .slider > .thumb {
        position: absolute;
        z-index: 3;
        width: 30px;
        height: 30px;
        background-color: #6200ee;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(98,0,238,.1);
        transition: box-shadow .3s ease-in-out;
    }
    .slider__thumb-left-value,
    .slider__thumb-right-value{
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
    }
    .slider > .thumb.left {
        transform: translate(-15px, -10px);
    }
    .slider > .thumb.right {
        transform: translate(15px, -10px);
    }
    input[type=range] {
        position: absolute;
        pointer-events: none;
        -webkit-appearance: none;
        z-index: 2;
        height: 10px;
        width: 100%;
        opacity: 0;
    }
    input[type=range]::-webkit-slider-thumb {
        pointer-events: all;
        width: 30px;
        height: 30px;
        border-radius: 0;
        border: 0 none;
        background-color: red;
        -webkit-appearance: none;
    }

    .product-template__filters--clear{
        cursor: pointer;
        margin-left:15px;
    }
    .product-template__filters{
        color:#e9501b;
        margin:20px 0;
        display:flex;
    }
</style>

<?php get_footer(); ?>

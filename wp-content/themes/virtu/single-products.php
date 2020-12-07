<?php get_header(); ?>
<?php
	$post_id = get_the_ID();
?>
	<main role="main">
	<!-- section -->
	<section class="single-product-template">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img class="lazy lazy-loading pepper-image" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pepper.png" alt="">
  		    <div class="container">
                <h2 class="breadcrumbs__h2">Produkty</h2>
                <?php the_breadcrumb(); ?>
            </div>
			<div class="single-product">
                <div class="container">
                    <div class="single-product__top">
                        <div class="single-product__top__div galery-image col-md-6">
                            <?php
                                $images = get_field('product_gallery');
                                $size = 'full';
                                if( $images ): ?>
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <?php $image = get_field( 'product_options_thumb' ); ?>
                                                    <?php if ( $image ) :
                                                    $imageurl = wp_get_attachment_image_url($image, 'full');?>
                                                    <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                                                <?php endif; ?>
                                            </div>
                                            <?php foreach( $images as $image_id ): ?>
                                                <div class="swiper-slide">
                                                    <?php $imageurl = wp_get_attachment_image_url($image_id, 'full');?>
                                                    <img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="swiper-navigation swiper-navigation__prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19">
                                                <path fill="#E9501B" fill-rule="evenodd" d="M-3 5.974L-1.107 4 5.98 11.132 13.067 4 15 5.934 5.98 15z" transform="matrix(0 -1 -1 0 15.5 15.5)"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-navigation swiper-navigation__next">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19">
                                               <path fill="#E9501B" fill-rule="evenodd" d="M33 5.974L34.893 4 41.98 11.132 49.067 4 51 5.934 41.98 15z" transform="rotate(-90 24 27.5)"/>
                                          </svg>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <div class="single-product__top__div short-description col-md-6">
							<div class="products__short-description">
								<h3 class="short-description__h3"><?php the_title(); ?></h3>

								<div class="heading-blog">
									<div class="heading-blog__icons">
										<div id="fb-share-button"><img class="lazy lazy-loading pdf-download" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/social-share.svg" alt=""></div>
										<a class="download-pdf-id" target="_blank" href="/create-pdf-products/?postid=<?php echo $post_id ?>"><img class="lazy lazy-loading pdf-download" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pdf-download.svg" alt=""></a>
									</div>
								</div>
							</div>
                            <p class="short-description__p"><?php the_field( 'products_short_description' ); ?></p>
                        </div>
                    </div>

                    <h3 class="products_table_headings__h3">Wartości odżywcze</h3>
                    <div class="single-product__more-info">
                        <div class="single-product__more-info__div col-md-8">
                            <?php if ( have_rows( 'products_table_headings' ) ) : ?>
                            <table>
                                <tr>
                                    <?php while ( have_rows( 'products_table_headings' ) ) : the_row(); ?>
                                        <th><?php the_sub_field('products_table_column_name'); ?></th>
                                    <?php endwhile; ?>
                                </tr>
                                <?php if ( have_rows( 'table_rows' ) ) : ?>
                                    <?php while ( have_rows( 'table_rows' ) ) : the_row(); ?>
                                        <tr>
                                            <?php if ( have_rows( 'table_row_data' ) ) : ?>
                                                <?php while ( have_rows( 'table_row_data' ) ) : the_row(); ?>
                                                    <td><?php the_sub_field('table_row_data_text'); ?></td>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </table>
                            <?php endif; ?>
                        </div>
                        <div class="single-product__more-info__div col-md-4">
                            <div>
                                <p><?php the_field( 'products_more_info' ); ?></p>
                            </div>
                        </div>
                    </div>
			</div>

			<?php if ( have_rows( 'products_dark_items' ) ) : ?>
				<div class="single-product__dark-section">
					<img class="lazy lazy-loading leaf-image" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/leaf-homepage-top.png" alt="">
					<div class="container">
						<div class="row">
							<?php while ( have_rows( 'products_dark_items' ) ) : the_row(); ?>
								<div class="single-product__dark-section__ctr">
									<?php $image = get_sub_field( 'products_dark_items_icon' ); ?>
										<?php if ( $image ) :
											$imageurl = wp_get_attachment_image_url($image, 'full');?>
											<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
										<?php endif; ?>
										<p><?php the_sub_field( 'products_dark_items_text' ); ?></p>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>



<?php if ( have_rows( 'awards', 24 ) ) : ?>
	<div class="single-product__awards">
		<div class="container">
				<?php while ( have_rows( 'awards', 24 ) ) : the_row(); ?>
					<h2 class="heading-with-icon"><?php the_sub_field( 'about_us_awards_main_text', 24 ); ?></h2>
					<div class="about-us-awards__ctr">
						<div class="icon-section">
								<?php $image1 = get_sub_field( 'about_us_awards_image_1', 24 ); ?>
									<?php if ( $image1 ) :
									$imageurl = wp_get_attachment_image_url($image1, 'full');?>
									<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
								<?php endif; ?>
								<div class="icon-section--data">
									<h6><?php the_sub_field( 'about_us_awards_heading_1', 24 ); ?></h6>
									<p><?php the_sub_field( 'about_us_awards_year_1', 24 ); ?></p>
								</div>
						</div>
						<div class="icon-section">
								<?php $image2 = get_sub_field( 'about_us_awards_image_2', 24 ); ?>
									<?php if ( $image2 ) :
									$imageurl = wp_get_attachment_image_url($image2, 'full');?>
									<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
								<?php endif; ?>
								<div class="icon-section--data">
									<h6><?php the_sub_field( 'about_us_awards_heading_2', 24 ); ?></h6>
									<p><?php the_sub_field( 'about_us_awards_year_2', 24 ); ?></p>
								</div>
						</div>
						<div class="icon-section">
								<?php $image3 = get_sub_field( 'about_us_awards_image_3', 24 ); ?>
									<?php if ( $image3 ) :
									$imageurl = wp_get_attachment_image_url($image3, 'full');?>
									<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
								<?php endif; ?>
								<div class="icon-section--data">
									<h6><?php the_sub_field( 'about_us_awards_heading_3', 24 ); ?></h6>
									<p><?php the_sub_field( 'about_us_awards_year_3', 24 ); ?></p>
								</div>
						</div>
					</div>
				<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>

	<div class="single-product__where-buy homepage-where-buy">
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
				<?php $where_buy_link = get_field( 'where_buy_link', 7 ); ?>
					<?php if ( $where_buy_link ) : ?>
						<div class="btn-div">
						<a class="btn" href="<?php echo esc_url( $where_buy_link) ; ?>">Zobacz wszystkie</a>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>




	</div>
</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>

	<?php endif; ?>

	</section>

	</main>
<script>

var fbButton = document.getElementById('fb-share-button');
var url = window.location.href;

fbButton.addEventListener('click', function() {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
        'facebook-share-dialog',
        'width=600,height=500'
    );
    return false;
});

</script>

<?php get_footer(); ?>

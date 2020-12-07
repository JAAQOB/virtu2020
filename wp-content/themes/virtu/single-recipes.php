<?php get_header(); ?>
<?php
	$post_id = get_the_ID();
?>
	<main role="main">
	<!-- section -->
	<section class="single-recipes-template">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img class="lazy lazy-loading leaves-brands" data-src="<?php echo get_template_directory_uri(); ?>/img/about-us/leaves.png" alt="">
  		    <div class="container">
                <h2 class="breadcrumbs__h2">Przepis</h2>
				<?php the_breadcrumb(); ?>
			</div>
				<div class="single-recipes">
					<div class="single-recipes__top">
						<div class="single-recipes__top__div galery-image col-md-5">
							<?php
								$image = get_field( 'product_options_thumb' ); ?>
								<?php if ( $image ) :
								$imageurl = wp_get_attachment_image_url($image, 'full');?>
								<img class="lazy lazy-loading" data-src="<?= $imageurl ?>" alt=""/>
				            <?php endif; ?>
						</div>
						<div class="single-recipes__top__div taxonomies-div col-md-1">
						</div>
						<div class="single-recipes__top__div short-description col-md-7">
							<div class="heading-blog">
								<h3 class="short-description__h3"><?php the_title(); ?></h3>
								<div class="heading-blog__icons">
									<div id="fb-share-button"><img class="lazy lazy-loading pdf-download" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/social-share.svg" alt=""></div>
									<a class="download-pdf-id" target="_blank" href="/create-pdf/?postid=<?php echo $post_id ?>"><img class="lazy lazy-loading pdf-download" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/pdf-download.svg" alt=""></a>
								</div>
							</div>
							<p class="short-description__p"><?php the_field( 'recipes_short_description' ); ?></p>
						</div>
					</div>

					<div class="single-recipes__more-info">
						<div class="container">
							<div class="row">
								<div class="col-md-5">
										<?php if ( have_rows( 'recipe_shopping_lists' ) ) : ?>
											<?php while ( have_rows( 'recipe_shopping_lists' ) ) : the_row(); ?>
											<div class="single-recipes__more-info__list-info">
												<h4><?php the_sub_field( 'recipe_shopping_components' ); ?></h4>
												<h4><?php the_sub_field( 'recipe_shopping_measure' ); ?></h4>
											</div>
												<?php if ( have_rows( 'recipe_shopping_components_items' ) ) : ?>
													<div class="form-group">
													<?php $i=1; while ( have_rows( 'recipe_shopping_components_items' ) ) : the_row(); ?>
														<label>
															<div class="form-group__items">
																<div class="form-group__items__div">
																		<input type="checkbox" name="contact-checkbox" class="form-checkbox" id='check<?php echo $i?>'>
																		<span><?php the_sub_field( 'recipe_shopping_components_items_list' ); ?></span>
																</div>
																<div class="form-group__items__div">
																	<span><?php the_sub_field( 'recipe_shopping_components_items_component_measuer' ); ?></span>
																</div>
															</div>
														</label>
													<?php $i++; endwhile; ?>
													</div>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
								</div>
								<div class="single-recipes__more-info__recipe-information col-md-7">
								<div class="single-recipes__more-info__recipe-information__div recipe-information--content">
									<div class="recipe-information--content__bg"></div>
									<?php if ( have_rows( 'recipe_information' ) ) : ?>
										<?php while ( have_rows( 'recipe_information' ) ) : the_row(); ?>

										<h3><?php the_sub_field( 'recipe_information_heading' ); ?></h3>
										<p><?php the_sub_field( 'recipe_information_info' ); ?></p>
										<h5><?php the_sub_field( 'recipe_small_heading' ); ?></h5>

										<?php if ( have_rows( 'recipe_information_prepare' ) ) : ?>
											<ul>
											<?php while ( have_rows( 'recipe_information_prepare' ) ) : the_row(); ?>
												<li><?php the_sub_field( 'recipe_information_prepare_information' ); ?></li>
											<?php endwhile; ?>
											</ul>
										<?php endif; ?>

										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class="single-recipes__more-info__recipe-information__div main_recipe--content">
									<?php if ( have_rows( 'main_recipe' ) ) : ?>
										<div class="main_recipe">
											<ul>
												<?php $i = 1; while ( have_rows( 'main_recipe' ) ) : the_row(); ?>
														<p data-id="<?php echo $i; ?>" class="steps_heading"><?php the_sub_field( 'main_recipe_steps_heading' ); ?></p>
														<li><?php the_sub_field( 'main_recipe_steps_info' ); ?></li>
												<?php $i++; endwhile; ?>
											</ul>
										</div>
									<?php endif; ?>
								</div>

								</div>
							</div>
						</div>
					</div>




				</div>
				<div class="comments-template--ctr">
					<img class="lazy lazy-loading plate-image" data-src="<?php echo get_template_directory_uri(); ?>/img/illustrations.png" alt="">
					<div class="comments-template__div">
						<?php comments_template(); ?>
					</div>
					<img class="lazy lazy-loading tomato" data-src="<?php echo get_template_directory_uri(); ?>/img/icons/tomato.png" alt="">
				</div>
	</article>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
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

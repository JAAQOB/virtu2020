<?php get_header(); ?>
<img class="lazy lazy-loading leaves-brands" src="<?php echo get_template_directory_uri(); ?>/img/icons/pepper.png" alt="">
<div class="container">
	<h2 class="breadcrumbs__h2">404</h2>
	<?php the_breadcrumb(); ?>

	<section class="page-404">
	<img class="lazy lazy-loading yellow-paprika" src="<?php echo get_template_directory_uri(); ?>/img/icons/yellow-paprika.png" alt="">
	<img class="lazy lazy-loading icon-gr" src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-gr.png" alt="">
	<img class="lazy lazy-loading small-garlic" src="<?php echo get_template_directory_uri(); ?>/img/icons/small-garlic.png" alt="">
	<img class="lazy lazy-loading tomato" src="<?php echo get_template_directory_uri(); ?>/img/icons/tomato.png" alt="">

			<div class="page-404__wrapper">
				<h2 class="error-code">Strona, której szukasz nie istnieje</h2>
				<a class="btn" href="/"><span>Przejdź do Strony Głównej</span></a>
				<span class="info">lub skorzystaj z wyszukiwarki i odkryj niepowtarzalny smak dań Virtu:</span>
				<img class="lazy lazy-loading" src="<?php echo get_template_directory_uri(); ?>/img/404.png" alt="">

			</div>
	</section>
</div>
<?php get_footer(); ?>

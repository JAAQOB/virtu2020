<?php
/**
 * Template Name: Create PDF
 */

	require_once 'js/lib/dompdf/autoload.inc.php';




	use Dompdf\Dompdf;

	$dompdf = new Dompdf();

		if($_GET['postid'] && is_numeric($_GET['postid'])){
			$get_page_id = $_GET['postid'];
		}
		$path = get_field( "product_options_thumb", $get_page_id );

		 if ( have_rows( 'recipe_information', $get_page_id ) ) :
			 while ( have_rows( 'recipe_information', $get_page_id ) ) : the_row();

			 $html = '<div style="text-align:center">'.wp_get_attachment_image( $path, "full" ). '</div>'.
			 $html = '<p style="text-align:center; color: #623b29; font-size:32px">'. get_the_title( $get_page_id ) . '</p>'.
			 $html = '<p class="short-description__p">'. get_field( "recipes_short_description", $get_page_id ) . '</p>'.
			 $html = '<p style="color: #623b29; font-size:24px; margin-bottom:-10px;">'.get_sub_field( 'recipe_information_heading', $get_page_id ). '</p>'.
			 $html = '<p style="color: #333333; font-size:14px;">'.get_sub_field( 'recipe_information_info', $get_page_id ). '</p>'.
			 $html = '<p style="color: #623b29; font-size:16px; margin-top:20px; margin-bottom:10px;">'.get_sub_field( 'recipe_small_heading', $get_page_id ). '</p>';
				if ( have_rows( 'recipe_information_prepare', $get_page_id ) ) :
						while ( have_rows( 'recipe_information_prepare', $get_page_id ) ) : the_row().
							$html .= '<li style="padding-left: 40px; ">'. get_sub_field( 'recipe_information_prepare_information', $get_page_id ) . '</li>';
						endwhile;
				endif;
			 endwhile;
		 endif;

		 if ( have_rows( 'main_recipe', $get_page_id ) ) :
			$i=1;
			while ( have_rows( 'main_recipe', $get_page_id ) ) : the_row().
				$html .= '
				<div style="height:20px"></div>
				<div style="display:flex;">
					<div style="display: block; align-items:center; justify-content:center; background: #623b29; border-radius: 100%; width: 26px; height: 26px; margin-bottom:-30px">
						<span style="margin-left:10px; color:#fff">'. $i.'</span>
					</div>
						<p style="margin-left:40px;  margin-bottom:0">'. get_sub_field( 'main_recipe_steps_heading', $get_page_id ) . '</p>
				</div>';
				$html .= '<p>'. get_sub_field( 'main_recipe_steps_info', $get_page_id ) . '</p>';
			$i++; endwhile;
		endif;

		if ( have_rows( 'recipe_shopping_lists', $get_page_id ) ) :
			while ( have_rows( 'recipe_shopping_lists', $get_page_id ) ) : the_row().
				$html .= '<div style="width:100%; display:flex; justify-content:space-between;">
							<table style="width:100%">';
				$html .= '<thead > <tr> <td style="text-align:left; background: #ede7e5; width:50%; padding-top:10px;">'. get_sub_field( 'recipe_shopping_measure', $get_page_id ) . '</td>';
				$html .= '<td style="text-align:left; background: #ede7e5; width:50%; padding-top:10px;">'. get_sub_field( 'recipe_shopping_components', $get_page_id ) . '</td></tr></thead>';
				$html .='<tbody>';
				if ( have_rows( 'recipe_shopping_components_items', $get_page_id ) ) :
						while ( have_rows( 'recipe_shopping_components_items', $get_page_id ) ) : the_row().
						$html .= '<tr><td style="border-bottom:1px solid #ede7e5; width:50%">'. get_sub_field( 'recipe_shopping_components_items_list', $get_page_id ) . '</td>';
						$html .= '<td style="border-bottom:1px solid #ede7e5; width:50%">'. get_sub_field( 'recipe_shopping_components_items_component_measuer', $get_page_id ) . '</td></tr>';
					endwhile;
				endif;
				$html .= '</tbody></table></div>';
			endwhile;
		endif;



    $content .= '<link rel="stylesheet" href="'. get_template_directory_uri() .'/fonts/FiraSans-Regular.ttf" type="text/css" />';

		$html.='<html><head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<style>
				html{padding:-30px;
					font-family:"Anodina-Regular";
				font-size:14px}
				body { font-family:"Anodina-Regular"; }
				th{
					font-family:"Anodina-Regular";
				}
				@font-face {
					font-family: Anodina-Regular;
					src: url("'.$content.'");
				}
			</style>
			</head><body>';
		$html.='</body></html>';


	$dompdf = new Dompdf(array(
        'enable_remote' => true
        )
	);

	$dompdf->loadHtml($html);


	$dompdf->setPaper('A4', '');

	$dompdf->render();

	$dompdf->stream('Virtu PDF', Array('Attachment' => 0));

	$options = new Options();
	$options->set('isRemoteEnabled',true);
	$dompdf = new Dompdf( $options );



?>

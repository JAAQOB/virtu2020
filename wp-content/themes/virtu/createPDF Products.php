<?php
/**
 * Template Name: Create PDF Products
 */

	require_once 'js/lib/dompdf/autoload.inc.php';




	use Dompdf\Dompdf;

	$dompdf = new Dompdf();

		if($_GET['postid'] && is_numeric($_GET['postid'])){
			$get_page_id = $_GET['postid'];
		}
		$path = get_field( "product_options_thumb", $get_page_id );


			 $html = '<div style="text-align:center">'.wp_get_attachment_image( $path, "full" ). '</div>'.
			 $html = '<p style="text-align:center; color: #623b29; font-size:32px">'. get_the_title( $get_page_id ) . '</p>'.
			 $html = '<p class="short-description__p">'. get_field( "products_short_description", $get_page_id ) . '</p>';


				if ( have_rows( 'products_table_headings', $get_page_id ) ) :
					$html .= '<p style="color:#623b29; font-size:24px; margin-top:50px; margin-bottom:30px;">Wartości odżywcze</p>';
					$html .= '<table style="width:100%; border-collapse: collapse; border-spacing: 0;"> <tr>';
						while ( have_rows( 'products_table_headings', $get_page_id ) ) : the_row().
							$html .= '<td style="border: 1px solid #dddddd; padding:10px; color:#623b29">'. get_sub_field( 'products_table_column_name', $get_page_id ) . '</td>';
						endwhile;
					$html .= '</tr>';
						 if ( have_rows( 'table_rows', $get_page_id ) ) :
							 while ( have_rows( 'table_rows', $get_page_id ) ) : the_row();
								 $html .= '<tr>';
									 if ( have_rows( 'table_row_data', $get_page_id ) ) :
										while ( have_rows( 'table_row_data', $get_page_id ) ) : the_row();
												$html .= '<td style="border: 1px solid #dddddd; padding:10px">'. get_sub_field( 'table_row_data_text', $get_page_id ) . '</td>';
										 endwhile;
									 endif;
								$html .= '</tr>';
							 endwhile;
						 endif;
					$html .= '</table>';
				endif;

		$html .= '<p style="margin-top:50px">' . get_field( 'products_more_info', $get_page_id ) . '</p>';




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

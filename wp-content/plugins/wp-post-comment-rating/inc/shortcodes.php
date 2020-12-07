<?php
	/**
	*** Average Rating Shortcode
	**/
add_shortcode( 'wppr_avg_rating', 'wpcr_avg_rating');
function wpcr_avg_rating($atts ) {
	$a = shortcode_atts( array(
		'title' => 'Rating',
		), $atts );
		
	global $post;
	
	$args = array('post_id' => $post->ID);
	
	$comments = get_comments($args);
	//var_dump($comments);
	
	$sum = 0;
	$count=0;
	
foreach($comments as $comment) :
	
	 $approvedComment = $comment->comment_approved; 
	
	 if($approvedComment > 0){  
	 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
	 }
	 if($rates){
		 $sum = $sum + (int)$rates;
		 $count++;
 	}
    
	endforeach;
		if($count != 0){ 
			$result=   $sum/$count;
		}else {
			$result= 0;
		}
	
	$chkresults = get_option('wpcr_settings');
	$check_val = isset($chkresults['checkbox2']) ? $chkresults['checkbox2'] : false;
	$tooltip_inline = isset($chkresults['tooltip_inline']) ? $chkresults['tooltip_inline'] : false;
	$avgrating_text = isset($chkresults['wpcravg_text']) ? $chkresults['wpcravg_text'] : false;
	
	
		if($avgrating_text == ''){
			$avg_text = __( 'Average', 'wp-post-comment-rating' );
		}else{
			$avg_text = $avgrating_text;
		}
			
			$avgText = __('average', 'wp-post-comment-rating');
			$outOf   = __('out of 5. Total', 'wp-post-comment-rating');
				
			
			if($count > 0){ 
				if($tooltip_inline == 1){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_tooltip" title="'.$avgText.': '.round($result,2).' '.$outOf.': '.$count.'"><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a></div>';
				}
				if($tooltip_inline == 0){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_inline" title=""><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a><span class="avg-inline">('.$avgText.': <strong> '.round($result, 2).'</strong> '.$outOf.': '.$count.')</span></div>';
				}
					
				 
                return $output;
			}else{
				return '';
			}
	}

	
add_shortcode( 'wppr_avg_rating_post_id', 'wpcr_avg_rating_post_id');
function wpcr_avg_rating_post_id($atts ) {
	$a = shortcode_atts( array(
		'id' => '',
		), $atts );
		
	global $post;
	
	$postID = $a['id'];
	$args = array('post_id' => $postID);
	
	$comments = get_comments($args);
	//var_dump($comments);
	
	$sum = 0;
	$count=0;
	
foreach($comments as $comment) :
	
	 $approvedComment = $comment->comment_approved; 
	
	 if($approvedComment > 0){  
	 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
	 }
	 if($rates){
		 $sum = $sum + (int)$rates;
		 $count++;
 	}
    
	endforeach;
		if($count != 0){ 
			$result=   $sum/$count;
		}else {
			$result= 0;
		}
	
	$chkresults = get_option('wpcr_settings');
	$check_val = isset($chkresults['checkbox2']) ? $chkresults['checkbox2'] : false;
	$tooltip_inline = isset($chkresults['tooltip_inline']) ? $chkresults['tooltip_inline'] : false;
	$avgrating_text = isset($chkresults['wpcravg_text']) ? $chkresults['wpcravg_text'] : false;
	
		if($avgrating_text == ''){
			$avg_text = __( 'Average', 'wp-post-comment-rating' );
		}else{
			$avg_text = $avgrating_text;
		}
			
			$avgText = __('average', 'wp-post-comment-rating');
			$outOf   = __('out of 5. Total', 'wp-post-comment-rating');
				
			
			if($count > 0){ 
				if($tooltip_inline == 1){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_tooltip" title="'.$avgText.': '.round($result,2).' '.$outOf.': '.$count.'"><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a></div>';
				}
				if($tooltip_inline == 0){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_inline" title=""><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a><span class="avg-inline">('.$avgText.': <strong> '.round($result, 2).'</strong> '.$outOf.': '.$count.')</span></div>';
				}
					
				 
                return $output;
			}else{
				return '';
			}
	}

<?php
add_action( 'comment_form_top', 'wpcr_change_comment_form_defaults');
function wpcr_change_comment_form_defaults( ) {
	global $wpdb;
    
	$results = get_option('wpcr_settings');
	$rt_enable = isset($results['checkbox1']) ? $results['checkbox1'] : false;
	$stars_label = isset($results['rtlabel']) ? $results['rtlabel'] : false;
		
	if($stars_label !== ''){
		$st_label = $stars_label;
	}else{
		$st_label = __('Please rate', 'wp-post-comment-rating');
	}
	
	$star1_title = __('Very bad', 'wp-post-comment-rating');
	$star2_title = __('Kinda bad', 'wp-post-comment-rating');
	$star3_title = __('Meh', 'wp-post-comment-rating');
	$star4_title = __('Pretty good', 'wp-post-comment-rating');
	$star5_title = __('Rocks!', 'wp-post-comment-rating');
	
	if($rt_enable == 'yes'){
		
		echo '<fieldset class="wppcr_rating">
		<legend>'.$st_label.'<span class="required">*</span></legend>
		<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="'.$star5_title.'">5 stars</label>
		<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="'.$star4_title.'">4 stars</label>
		<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="'.$star3_title.'">3 stars</label>
		<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="'.$star2_title.'">2 stars</label>
		<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="'.$star1_title.'">1 star</label>
		</fieldset>';
		
	}
}
 

//////// save comment meta data ////////
add_action( 'comment_post', 'wpcr_save_comment_meta_data' );

function wpcr_save_comment_meta_data( $comment_id ) {
	$rating =  (empty($_POST['rating'])) ? FALSE : $_POST['rating'];
    add_comment_meta( $comment_id, 'rating', $rating );
}

///////// validate meta field /////////

$options = get_option( 'wpcr_settings' );
$check_rtval = isset($options['checkbox1']) ? $options['checkbox1'] : false;
if ( $check_rtval == 'yes' ) {
	
	add_filter( 'preprocess_comment', 'wpcr_verify_comment_meta_data' );
	
}
function wpcr_verify_comment_meta_data( $commentdata ) {
	
	if ( ! isset( $_POST['rating'] ) )
		if($_POST['comment_parent'] == 0)
			if ( 'product' != get_post_type() ) 			
        wp_die( __( 'Error: You did not add your rating. Hit the BACK button of your Web browser and resubmit your comment with rating.', 'wp-post-comment-rating' ) );
				
    return $commentdata;
}

	/**
	* add average rating with post meta tags 
	**/
add_filter( 'the_tags', 'wpcr_tag_aggr',10,3 );
function wpcr_tag_aggr($tag_list, $before, $sep ) {
	
	global $passedtext, $post;
	$args = array('post_id' => $post->ID);
	
	$comments = get_comments($args);
		
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
			
			
			$avgText   = __('average', 'wp-post-comment-rating');
			$outOf     = __('out of 5. Total', 'wp-post-comment-rating');
			$output = "";
						
			if($check_val == 'yes'){
				if($count > 0){ 
					if($tooltip_inline == 1){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_tooltip" title="'.$avgText.': '.round($result,2).' '.$outOf.': '.$count.'"><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a></div>';
					}
					if($tooltip_inline == 0){
					$output = '<div class="wpcr_aggregate"><a class="wpcr_inline" title=""><span class="wpcr_stars" title="">'.$avg_text.':</span>';
					$output .= '<span class="wpcr_averageStars" data-wpcravg="'.round($result,2).'"></span></a><span class="avg-inline">('.$avgText.': <strong> '.round($result, 2).'</strong> '.$outOf.': '.$count.')</span></div>';
					}
										
				} 
                return $tag_list.$output;
			}else{
				return $tag_list;
			}
	}


///// show rating stars with visitors comment /////
add_filter('comment_text','wpcr_comment_tut_add_title_to_text',99,2);
function wpcr_comment_tut_add_title_to_text($text,$comment){ 
    
	global $passedtext;
	
	$results = get_option('wpcr_settings');
	$check1 = isset($results['checkbox1']) ? $results['checkbox1'] : false;
	$star_pos = isset($results['cmstr_pos']) ? $results['cmstr_pos'] : false;
	
		
    if($rateres=get_comment_meta($comment->comment_ID,'rating',true))
    {
		
		if($check1 == 'yes' ){
			$countresl = '('.$rateres.'/5)';
			//if(!is_admin()){
				$totlrate='<div class="cmstr-out"><span class="wpcr_author_stars" data-rating="'.$rateres.'" ></span><span class="tval">'.$countresl.'</span></div>';
			//}
			if($star_pos == 1){
				$result = $totlrate.$text;
			}elseif($star_pos == 0){
				$result = $text.$totlrate;
			}else{
				$result = $totlrate.$text;
			}
			
			$text=$result;
		}else{
			 $text=$text;
		}
        
    }
    return $text;
}
// enable next/prev post links
add_filter('the_content', 'wpcr_show_nav_links',20, 1);
function wpcr_show_nav_links($html){
	//ob_start();
	global $post;
	if(is_single()){
		
		$wpcr_options = get_option('wpcr_settings');
		$navval = isset($wpcr_options['shownav']) ? $wpcr_options['shownav'] : false;
		$wpcr_socialshare = isset($wpcr_options['wpcr_social']) ? $wpcr_options['wpcr_social'] : false;	
	
		// Get current page URL 
		$wpcr_URL = get_permalink();
 		
		// Get current page title
		$wpcr_Title = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$wpcr_Thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 		
		
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$wpcr_Title.'&amp;url='.$wpcr_URL.'';
		$facebookURL = 'https://www.facebook.com/sharer.php?s=100&amp;p[url]='.$wpcr_URL.'&p[title]='.$wpcr_Title.'&amp;p[images][0]='.$wpcr_Thumbnail[0].'';
		$googleURL = 'https://plus.google.com/share?url='.$wpcr_URL;
	
		if($navval == 1){
			$html .= '<div class="wpcr_floating_links"><ul>';
			
			if($link = get_previous_post_link('%link','<i class="fa-fa-long-arrow-left"></i>' )) {
				$html .= '<li class="prev_link">'.$link.'</li>';
				}else{
				$html .= '<li class="no_link"><i class="fa-fa-long-arrow-left"></i></li>';
			}
			if($nextlink = get_next_post_link('%link','<i class="fa-fa-long-arrow-right"></i>' )) {
				$html .= '<li class="next_link">'.$nextlink.'</li>';
				}else{
				$html .= '<li class="no_link"><i class="fa-fa-long-arrow-right"></i></li>';
			}	
			if($wpcr_socialshare == 1){			
				$html .= '<li class="wpcr_social"><a href="'. $facebookURL .'" target="_blank"><i class="fa-fa-facebook"></i></a></li>';			 
				$html .= '<li class="wpcr_social"><a href="'. $twitterURL .'" target="_blank"><i class="fa-fa-twitter"></i></a></li>';			 
				$html .= '<li class="wpcr_social"><a href="'. $googleURL .'" target="_blank"><i class="fa-fa-google-plus"></i></a></li>';			 
			}
			$html .= '</ul></div>';
		}
	}
    return $html;
}
add_action('wp_head', 'wpcr_add_meta_tags_for_ss', 5);
function wpcr_add_meta_tags_for_ss(){
		//ob_start();
		global $post;
	
		$results = get_option('wpcr_settings');
		$wpcr_socialsharee = isset($results['wpcr_social']) ? $results['wpcr_social'] : false;		
	
		// Get current page URL 
		$wpcr_URL = get_permalink();
 		
		// Get current page title
		$wpcr_Title = str_replace( ' ', '%20', get_the_title());
		
		
		// Get Post Thumbnail for pinterest
		$wpcr_Thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		
		$post_id = get_queried_object_id();
        $post_obj = get_post( $post_id );
        $content = wp_strip_all_tags($post_obj->post_content);
		//var_dump($content);

			if($wpcr_socialsharee == 1){		
				
				$html = '<meta itemprop="name" content="'.$wpcr_Title.'">';
                $html .= '<meta itemprop="description" content="'.$content.'">';
                $html .= '<meta itemprop="image" content="'.$wpcr_Thumbnail[0].'">';
                
                $html .= '<meta name="twitter:card" content="summary">';
                $html .= '<meta name="twitter:title" content="'.$wpcr_Title.'">';
                $html .= '<meta name="twitter:description" content="'.$content.'">';
                $html .= '<meta name="twitter:image" content="'.$wpcr_Thumbnail[0].'">';
                
				$html .= '<meta property="og:title" content="'.$wpcr_Title.'" />';
				$html .= '<meta property="og:type" content="article" />';
				$html .= '<meta property="og:url" content="'.$wpcr_URL.'" />';
				$html .= '<meta property="og:image" content="'.$wpcr_Thumbnail[0].'" />';
				$html .= '<meta property="og:description" content="'.$content.'" />';
				echo $html;
			}
	}

// add body class
add_filter( 'body_class', 'wpcr_add_body_class' );
function wpcr_add_body_class($class){
	if(is_single()){
		$class[] = 'wpcr_single_post';
    }
    return $class;
}
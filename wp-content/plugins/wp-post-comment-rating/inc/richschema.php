<?php
	/** 
	** Enable google rich snippets
	**/
function wpcr_rich_snippets($content) {
	global $post;
	$args = array('post_id' => $post->ID);
	$comments = get_comments($args);
	$output = '';	
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
			$enable_snippets = isset($chkresults['wpcrrichschema']) ? $chkresults['wpcrrichschema'] : false;
			$schema_type = isset($chkresults['wpcr_structured_data_type']) ? $chkresults['wpcr_structured_data_type'] : false;
						
			$link = get_permalink($post->ID);
			$name = wp_strip_all_tags(get_the_title($post->ID));
			$author = get_the_author($post->ID);
			$image = get_the_post_thumbnail_url($post->ID);
            $result = round($result, 2);
			if($enable_snippets == 'yes'){
				if($count > 0){ 
					$output = '<script type="application/ld+json">
								{
								"@context": "http://schema.org",
								"@type": "'.$schema_type.'",
								"aggregateRating": {
								"@type": "AggregateRating",
								"bestRating": "5",
								"ratingCount": "'.$count.'",
								"ratingValue": "'.$result.'"
								},
								"image": "'.$image.'",
								"name": "'.$name.'",
								"description": "'.$name.'"
								}
								</script>';
					} 
				return $content.$output;
            }else{
				return $content;
			}
		}

add_filter('the_content', 'wpcr_rich_snippets', 30, 1);
jQuery( document ).ready(function() {
	jQuery( ".wpcr_author_stars" ).each(function() { 
		// Get the value
		var val = jQuery(this).data("rating");
		// Make sure that the value is in 0 - 5 range, multiply to get width
		var size = Math.max(0, (Math.min(5, val))) * 16;
		// Create stars holder
		var $span = jQuery('<span />').width(size);
		// Replace the numerical value with stars
		jQuery(this).html($span);
	});
	
	
	jQuery( ".wpcr_averageStars" ).each(function() { 
		// Get the value
		var val1 = jQuery(this).data("wpcravg");
		//alert(val1);
		// Make sure that the value is in 0 - 5 range, multiply to get width
		var size1 = Math.max(0, (Math.min(5, val1))) * 16;
		// Create stars holder
		var $span1 = jQuery('<span />').width(size1);
		// Replace the numerical value with stars
		jQuery(this).html($span1);
	});
	


	jQuery( ".comment-reply a.comment-reply-link" ).click(function() {
		jQuery('fieldset.wppcr_rating').addClass('disabled');
			setTimeout(function(){
				jQuery('.wppcr_rating.disabled').css({"display": "none", "pointer-events": "none"});
			}, 100);
	});
	jQuery( "#cancel-comment-reply-link" ).click(function() {
		jQuery('fieldset.wppcr_rating').removeClass('disabled').removeAttr("style")
	});
	
    // Show the div in 5s
    jQuery(".wpcr_floating_links").delay(3000).fadeIn(300);

});
	

	
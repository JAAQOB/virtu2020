jQuery(document).ready(function($){
    $('.wpcrcolor-field').wpColorPicker();
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
	
});
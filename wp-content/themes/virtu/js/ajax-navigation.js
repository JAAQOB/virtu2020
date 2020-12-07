( function($) {
	$(document).on( 'click', '.selectit', function(event) {
		$.ajax({
			url: ajaxvariables.ajaxurl,
			type: "post",
			data: '{ action: "ajax_navigation" }',
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			success: function(result) {
				alert(result);
			}
		})
	})
})(jQuery);
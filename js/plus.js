jQuery(function($) {
	jQuery(document).ready(function() {
		$('.current #content_no p:has(img)').each(function( index ) {
			$(this).css('margin-top','0px');
			$(this).css('margin-right','0px');
			$(this).css('margin-bottom','20px');
			$(this).css('margin-left','0');
			$(this).css('width','100%');
			console.log(122)
		});
	});
});


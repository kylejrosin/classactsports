jQuery(document).ready(function($){
	
	$('#acf-field-content_type-paginated').click(function(){
		$('#postdivrich').hide();
	});
	
	$('#acf-field-content_type-default').click(function(){
		$('#postdivrich').show();
		var scroll = $(window).scrollTop()+1;
		$(window).scrollTop(scroll);
	});
	
	$('#acf-field-content_type-video').click(function(){
		$('#postdivrich').show();
		var scroll = $(window).scrollTop()+1;
		$(window).scrollTop(scroll);
	});
	
	setTimeout(function(){
		if ($('#acf-field-content_type-paginated').prop('checked')) {
			$('#postdivrich').hide();
		}
	}, 1500)
	
});
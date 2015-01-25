$('document').ready(function() {
	$(window).resize(function(e) {
		$('#content').css('min-height',$(window).height()-$('header').height()-$('footer').height() - 90 +'px');
	}).resize();
	
	$('.submitForm').click(function(e) {
		$(this).parent('form').submit();
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});
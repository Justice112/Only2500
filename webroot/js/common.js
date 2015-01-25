$('document').ready(function() {
	$(window).resize(function(e) {
		$('#content .inner').css('min-height',$(window).height()-$('header').height()-$('footer').height()+'px');
	}).resize();
	
	$('.submitForm').click(function(e) {
		$(this).parents('form').submit();
	});
    $('input').keydown(function(e){
        if(e.keyCode==13){
            $(this).parents('form').submit();//处理事件
        }
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});
$(document).ready(function(){
	// SEND FORMS
	$('.send-ajax').click( function() {
		var form = $(this).closest('form');
		
		if ( form.valid() ) {
			form.css('opacity','.5');
			var actUrl = form.attr('action');

			$.ajax({
				url: actUrl,
				type: 'post',
				dataType: 'html',
				data: form.serialize(),
				success: function(data) {
					form.html(data);
					form.css('opacity','1');
				},
				error:	 function() {}
			});
		}
	});
	
	$('.send').click( function() {
		var form = $(this).closest('form');
		
		if ( form.valid() ) {
			form.submit();
		}
	});
	
	/*
		Slide to block. Add class "go-to-block" to link or button and data-attribute with target class or id
		Example: <a href="#" class="go-to-block" data-target=".slide-1">Slide</a>
	*/
	
	$(".go-to-block").click(function() {
		var target = $(this).data('target');
		
	    $('html, body').animate({
	        scrollTop: $(target).offset().top - 30
	    }, 400);
	});

	/*for (var i = 14; i < 60; i++) {
		if (i%2==0) {
			console.log('.font-' + i + '{font-size: ' + (i / 16) + 'em;}');
		}*
	}*/
});
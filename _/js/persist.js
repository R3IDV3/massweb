$(function(){
	
	var original = $('.persist'),
		clone;
	
	clone = original.clone().css({
		'width': original.width(),
		'height': original.height(),
	}).addClass('float').removeClass('persist').appendTo('#persistant-thead');
    
    original.find('tr').first().children('th').each(function(i, el){
		$(clone.find('tr').children()[i]).width($(el).width());
	});
	
	var summaryClone = $('.search-summary')
						.clone()
						.css({
							'position': 'fixed',
							'top': $('.float').height(),
							'width': '100%',
							'display': 'none'
						})
						.appendTo('#persistant-search-summary');
	
	$(window)
		.scroll(function(){
			var original = $('.persist'),
				originalTable = original.parent(),
				clone = $('.float'),
				offset = originalTable.offset(),
				scrollTop = $(window).scrollTop();
			
			if ((scrollTop > offset.top) && (scrollTop < offset.top + originalTable.height())) {
				clone.css({
					"visibility": "visible",
					"opacity": 1
				});
				original.css({
					"visibility": "hidden"
				});
			} else {
				clone.css({
					"visibility": "hidden",
					"opacity": 0
				});
				original.css({
					"visibility": "visible"
				});
				$('#persistant-search-summary').children('.search-summary').fadeOut();
			}
		})
		.trigger('scroll');
	
	if ( $('html').hasClass('no-touch') ) {	
		$('.float, #persistant-search-summary')
			.hover(function(){
				if ( $('.float').is(":hover") || $('#persistant-search-summary').is(":hover") ) {
					$('#persistant-search-summary').children('.search-summary').fadeIn();
				} else {
					$('#persistant-search-summary').children('.search-summary').fadeOut();
				}
			});
	} else {
		$('.results-table').scroll(function(){
			var left = 0 - $(this).scrollLeft();
			$('.float').css('left', left);
		});
	}
});
$(function(){
	
	$('#content-2').css('margin-top', 0 - $('#content-1').height() + 'px' );
	
	$('#about-more').click(function(){
		$('#content-1').toggleClass('show');
		$('#content-2').toggleClass('show');
		$(window).trigger('scroll');
		$('#chart-quantity, #chart-mass').find('canvas').fadeIn();
		//$('body').addClass('prevent-scrolling');
	});
	
	$('#about-less').click(function(){
		$('#content-1').toggleClass('show');
		$('#content-2').toggleClass('show');
		$('#chart-quantity, #chart-mass').find('canvas').fadeOut();
		//$('body').removeClass('prevent-scrolling');
	});
	
	if ( $('html').hasClass('no-touch') ) {
		$('.chart-value').mouseenter(function(){
			$(this).addClass('hide').siblings('.chart-milestone').addClass('show');
		});
		
		$('.chart-value').mouseleave(function(){
			$(this).siblings('.chart-milestone').removeClass('show').end().removeClass('hide');
		});
	} else {
		$('.chart-value').on('touchstart', function(){
			$(this).addClass('hide').siblings('.chart-milestone').addClass('show');
		});
		
		$('.chart-value').on('touchend', function(){
			$(this).siblings('.chart-milestone').removeClass('show').end().removeClass('hide');
		});
	}
});
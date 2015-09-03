$(function(){
	if ( $('footer').bottom() < window.innerHeight ) {
		$('footer').css({
			'position': 'absolute',
			'bottom': 0,
			'width': '100%'
		}).before($(document.createElement('div')).addClass('filler').css('height', $('footer').top() - $('main').bottom()));
	}
});
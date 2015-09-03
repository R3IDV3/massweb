(function(){
	var randN = Math.floor((Math.random() * 11) + 1);
	if ($('.tilt-effect').length) {
		$('.tilt-effect').attr('src', '_/img/insect'+ randN +'.jpg');
	} else {
		$('body').append('<img src="_/img/insect'+ randN +'.jpg" id="hidden-image" style="display:none;" />');
	}
	if ( navigator.userAgent.toLowerCase().indexOf('chrome') > -1 ) {
		$('body').css({
			'background-image': 'url(_/img/insect'+ randN +'-blurred.jpg)',
			'background-attachment': 'scroll',
			'background-repeat': 'repeat-y'
		});
	} else {
		$('body').css('background-image', 'url(_/img/insect'+ randN +'-blurred.jpg)');
	}
	
	// account for really bright backgrounds
	if (randN == 4) {
		$('header #feature h1, header #feature a').css('text-shadow', '-1px -1px 2px rgba(0, 0, 0, 0.3), 1px -1px 2px rgba(0, 0, 0, 0.3), -1px 1px 2px rgba(0, 0, 0, 0.3), 1px 1px 2px rgba(0, 0, 0, 0.3)');
		$('nav a').css('color', '#000');
		$('#logo').css({
			'-webkit-filter': 'invert(100%)',
					'filter': 'invert(100%)'
		});
	} else if (randN == 11) {
		$('header #feature h1, header #feature a').css('text-shadow', '-1px -1px 2px rgba(0, 0, 0, 0.3), 1px -1px 2px rgba(0, 0, 0, 0.3), -1px 1px 2px rgba(0, 0, 0, 0.3), 1px 1px 2px rgba(0, 0, 0, 0.3)');
	} else if (randN == 5) {
		$('nav a').css('color', '#000');
		$('#logo').css({
			'-webkit-filter': 'invert(100%)',
					'filter': 'invert(100%)'
		});
	}
	
	/* Set search background */
	$(window).load(function(){
		if ($('.tilt-effect').length) {
			var colorThief = new ColorThief();
			var dominantColor = colorThief.getColor(document.querySelector('.tilt-effect'));
			
			var r = dominantColor[0];
			var g = dominantColor[1];
			var b = dominantColor[2];
			var brightness = brightness(r,g,b);
			
			/* Set browse background */
			$('.mp-menu').css('background-color', 'rgba('+r+','+g+','+b+',1)');
			
			/* Set search background */
			$('#search').css('background-color', 'rgba('+r+','+g+','+b+',0.75)');
			
			if (brightness < 130) { // use bright .nl-field-toggles
				$('.nl-field-toggle').css({
					'color': 'rgba(200,200,200,0.5)',
					'border-bottom': '1px dashed rgba(200,200,200,0.5)'
				});
				$('.mp-menu').css('color', 'rgba(255,255,255,0.75)');
			}
			
			function brightness(r,g,b) {
				return Math.sqrt(
					r * r * .241 +
					g * g * .691 +
					b * b * .068
				);
			}
		} else if ($('#hidden-image').length) {
			var colorThief = new ColorThief();
			var dominantColor = colorThief.getColor($('#hidden-image')[0]);
			
			var r = dominantColor[0];
			var g = dominantColor[1];
			var b = dominantColor[2];
			var brightness = brightness(r,g,b);
			
			//$('.search-summary').css('background-color', 'rgba('+r+','+g+','+b+',0.75)');
			$('#pagination').css('background-color', 'rgba('+r+','+g+','+b+',0.75)');
			
			/* Set browse background */
			$('.mp-menu').css('background-color', 'rgba('+r+','+g+','+b+',1)');
			
			if (brightness < 130) { // use bright headings
				$('.mp-menu').css('color', 'rgba(255,255,255,0.75)');
			}
			
			function brightness(r,g,b) {
				return Math.sqrt(
					r * r * .241 +
					g * g * .691 +
					b * b * .068
				);
			}
		}
	});
	
	// correct text color in browse menu for some backgrounds
	if (randN != 4 && randN != 5) {
		$('.mp-menu').css('color', 'rgba(255,255,255,0.75)');
	} else {
		$('.mp-close').addClass('dark');
	}
	
	/* Fade out .tilt image on downscroll */
	if ($('.tilt-effect').length) {
		$(window).scroll(function(){
			var height = $(window).height(),
				top = $(window).scrollTop(),
				opacity = (height - top) / height;
			if ( $('.tilt').length ) {
				$('.tilt').css('opacity', opacity );
			} else if ( $('.touch-tilt').length ) {
				$('.touch-tilt').css('opacity', opacity );
			}
		});
	}
})();
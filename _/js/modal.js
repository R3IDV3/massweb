$(function(){
	$('.md-trigger').click(function(){
		$('body').toggleClass('prevent-scrolling');
		$( '#' + $(this).attr('data-modal') ).toggleClass('open');
		$(this).toggleClass('open');
	});
	
	$('.md-close').click(function(){
		$('body').removeClass('prevent-scrolling');
		$(this).parents('.modal').removeClass('open');
		$(this).parents('.modal').find('.back').removeClass('show');
	});
	
	$('.modal .content').click(function(){
		if ( !$(this).find('.popover').length ) {
			// close the modal
			$('body').removeClass('prevent-scrolling');
			$(this).parents('.modal').removeClass('open');
			$(this).parents('.modal').find('.back').removeClass('show');		
		}
	});
	
	$('.dialog').click(function(event){
		// if an .md-switch isn't the element being clicked in the dialog
		if ( !$(event.target).is('.md-switch') ) {
			// prevent closing the modal if dialog is clicked
			event.stopPropagation();			
		}
	});
	
	$('.md-switch').click(function(){
		$(this).parents('.modal').find('.back').removeClass('show');
		$(this).parents('.modal').removeClass('open');
		$( '#' + $(this).attr('data-modal') ).addClass('open');
		$( '#' + $(this).attr('data-modal') ).find('.back').addClass('show').attr('data-modal', $(this).parents('.modal').attr('id'));
	});
	
	$(document).keyup(function(e){
		if (e.keyCode == 27) { // escape button pressed
			$('body').removeClass('prevent-scrolling');
			$('.modal.open').removeClass('open');
			$('.help.open').removeClass('open');
		}
	});
});





/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
/*
var ModalEffects = (function() {

	function init() {

		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' );

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				if ( classie.has( modal, 'md-show' ) ) {
					removeModalHandler();
					el.removeAttribute('style');
					document.getElementsByTagName("BODY")[0].removeAttribute('style');
				} else {
					classie.add( modal, 'md-show' );
					overlay.removeEventListener( 'click', removeModalHandler );
					overlay.addEventListener( 'click', removeModalHandler );
					el.style.backgroundPosition = "right center";
					document.getElementsByTagName("BODY")[0].style.overflow = "hidden";
				}

				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});

		} );

	}

	init();

})();
*/
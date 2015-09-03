/*
// get all the nl-field-toggles (they need help bubbles)
var nlFieldToggle = document.querySelectorAll( '.nl-field-toggle' );

// for each nlFieldToggle
for (var i in nlFieldToggle) {
	// get it's bounding client rectangle
	var nlFieldToggleRect = nlFieldToggle[i].getBoundingClientRect();
	// make a popover:
		var newPopover = document.createElement("DIV");
		newPopover.setAttribute("class", "popover");
		newPopover.setAttribute("style", "left: "+nlFieldToggleRect.right); // set the left position to the right position of the nl-field-toggle it is displaying help for
		var title = document.createElement("H1"); // style this with CSS
		title.innerHTML = // get the data-title of the nlFieldToggle or something??
		var content = document.createElement("P"); // style this with CSS
		content.innerHTML = // get the data-content of the nlFieldToggle or something??
		document.getElementById('help-modal-content').appendChild(newPopover);
}
*/

$(function(){
	if ( $('html').hasClass('no-touch') ) {
		/* Set-up */
		$('.nl-field-toggle[data-title!="null"]').each(function(i){
			var $self = $(this),
				left = ($self.offset().left + $self.width() + 15),
				top = $self.offset().top - $('#search').offset().top;
			$('#help-modal').children('.content').append(
				$(document.createElement('div'))
					.addClass('popover')
					.attr('id', 'popover-' + i)
					.append( $(document.createElement('h1')).html( $self.attr('data-title') ) )
					.append( $(document.createElement('p')).html( $self.attr('data-description') ) )
					.append( $(document.createElement('span')).addClass('navigation')
						.append( $(document.createElement('span')).addClass('previous') )
						.append( $(document.createElement('span')).addClass('next') )
					)
					.css({
						'left': left,
						'top': top
					})		
			);
			$('#popover-' + i).css({
				'-webkit-transform': 'translateY(' + ( 0.5 * ($self.height() - $('#popover-' + i).height()) ) + 'px)',
				'-ms-transform': 'translateY(' + ( 0.5 * ($self.height() - $('#popover-' + i).height()) ) + 'px)',
				'transform': 'translateY(' + ( 0.5 * ($self.height() - $('#popover-' + i).height()) ) + 'px)'
			});
		});
		
		/* Define bounds */
		$('#popover-0').find('.previous').addClass('disabled');
		$('#popover-' + ( $('.nl-field-toggle[data-title!="null"]').length - 1 ) ).find('.next').addClass('disabled');
		
		/* Add functionality */
		var i = 0;
		$('#popover-0').toggleClass('show');
		
		$('.popover').find('.previous').click(function(event){
			event.stopPropagation();
			$('#popover-' + i).toggleClass('show');
			$('#popover-' + (i - 1)).toggleClass('show');
			i = i - 1;
		});
		
		$('.popover').find('.next').click(function(event){
			event.stopPropagation();
			$('#popover-' + i).toggleClass('show');
			$('#popover-' + (i + 1)).toggleClass('show');
			i = i + 1;
		});
		
	}
});
$(function(){
	var updateMpMenu = function(){
		/**
		 * Apply the correct transitions and classes in the current context 
		 */
		
		var numberOpen = $('.mp-level.show').length;
		
		$('.mp-menu.open .mp-level.show').each(function(){
			// translate each .mp-level by an amount proportional to the number 
			// of .mp-levels stacked on top of it
			$(this).css({
				'-webkit-transform': 'translate3d(' + (numberOpen - $(this).attr('data-level'))*-40 + 'px,0,0)',
					'-ms-transform': 'translate3d(' + (numberOpen - $(this).attr('data-level'))*-40 + 'px,0,0)',
						'transform': 'translate3d(' + (numberOpen - $(this).attr('data-level'))*-40 + 'px,0,0)'
			});
			
			if ( numberOpen != $(this).attr('data-level') ) { // there is an .mp-level stacked on top of it
				$(this).addClass('stacked');
			}
		});
		
		if ( numberOpen == 0 ) { // enable scrolling on the body
			$('body').css({
				'height': '100%',
				'overflow': 'scroll'
			});
		} else { // disable scrolling on the body
			$('body').css({
				'height': '100vh',
				'overflow': 'hidden'
			});
		}
		
		$('.mp-level:not(.show)').find('.taxon-list').html('');
	}
	
	$('.mp-trigger').click(function(){ // open the browse menu initially
		$('.mp-menu').addClass('open');
		// show the first .mp-level
		$('.mp-level[data-level="1"]').addClass('show').find('.mp-search').val('');
		updateMpMenu();
		// populate the first data-level
		queryBrowse(this, 1);
	});
	
	// set a delegated click event since the list won't exist until the AJAX request received a response
	$('.mp-level .taxon-list').on('click', 'ul li', function(){ // when a item from the menu is clicked, drill down
		// get the current data-level
		var dataLevel = parseInt($(this).parents('.mp-level.show').attr('data-level'));
		// show the .mp-level with the next data-level
		$('.mp-level[data-level="' + ( dataLevel + 1) + '"]').addClass('show').find('.mp-search').val('');
		updateMpMenu();
		// populate the next data-level
		queryBrowse(this, dataLevel + 1);
	});
	
	// prevent the view all link from also triggering an mp-level switch
	$('.mp-level .taxon-list').on('click', 'ul li a', function(event){
		event.stopPropagation();
	});
	
	$('.mp-back').click(function(){
		// store the .mp-level for this back button
		var $parent = $(this).parents('.mp-level.show');
		// get the current data-level for the parent
		var dataLevel = parseInt($parent.attr('data-level'));
		// hide the parent and remove the transformation that has been applied to it
		$parent.removeClass('show').removeAttr('style');
		// place the previous data-level at the top of the stack
		$('.mp-level[data-level="' + ( dataLevel - 1) + '"]').removeClass('stacked');
		// close the menu if the back button on the first data-level is clicked
		if ( dataLevel == 1 ) {
			$('.mp-menu.open').removeClass('open');
		}
		updateMpMenu();
	});
	
	$('.mp-level .mp-overlay').click(function(){
		var $desiredMpLevel = $(this);
		// hide each .mp-level with a data-level greater than the selected .mp-level in the stack
		$('.mp-level.show').each(function(){
			if ( parseInt($(this).attr('data-level')) > parseInt($desiredMpLevel.parent().attr('data-level')) ) {
				$(this).removeAttr('style').removeClass('stacked').removeClass('show');
			}
		});
		// place the desired .mp-level at the top of the stack
		$(this).parent().removeClass('stacked');
		updateMpMenu();
	});
	
	$('.mp-menu ~ .mp-overlay').click(function(){
		// hide all open .mp-levels
		$('.mp-level.show').removeAttr('style').removeClass('stacked').removeClass('show');
		// close the .mp-menu
		$('.mp-menu.open').removeClass('open');
		updateMpMenu();
	});
	
	$('.mp-close').click(function(){
		// hide all open .mp-levels
		$('.mp-level.show').removeAttr('style').removeClass('stacked').removeClass('show');
		// close the .mp-menu
		$('.mp-menu.open').removeClass('open');
		updateMpMenu();
	});
	
	var queryBrowse = function(el, taxLevel) {
			
			if ( taxLevel > 1 ) { // if we are querying for taxonomy aside from class
				// store the highest taxonomy known
				var highestTaxId = $(el).attr('data-tax-id');
				var taxon = $(el).find('.name').text();
			}
			
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            	$('.mp-level[data-level="' + taxLevel + '"]').find('.taxon-list').html(xmlhttp.responseText);
	            	
	            	if ( $('.mp-level[data-level="' + taxLevel + '"]').find('.new-tax-id').text() == "subfamily_id" ) {
		            	$('#variable-taxon').text('Subfamiy').attr('data-icon', 'S');
	            	} else if ( $('.mp-level[data-level="' + taxLevel + '"]').find('.new-tax-id').text() == "genus_id" ) {
		            	$('#variable-taxon').text('Genus').attr('data-icon', 'G');
	            	}
	            }
	        }
	        
	        if ( taxLevel > 1 ) { // if we are querying for taxonomy aside from class
				xmlhttp.open("GET","query-mpLevelData.inc.php?taxlevel=" + taxLevel + "&highesttaxid=" + highestTaxId + "&taxon=" + taxon, true);
		    } else { // we are querying for all classes
				xmlhttp.open("GET","query-mpLevelData.inc.php", true);
			}
	        
			xmlhttp.send();
	}
});
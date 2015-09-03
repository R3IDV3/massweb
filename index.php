<!DOCTYPE html>
<html>
<head>
	<title>MassBase -- Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_/css/style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body id="home">
	<?php include "_/components/php/mp-menu-browse.php"; ?>
<!--
	<div class="mp-content-wrapper">
		<div class="mp-content">
-->
			<?php include "_/components/php/header.php"; ?>
			<?php include '_/components/php/content-home.php'; ?>
			<?php include "_/components/php/nl-search.php"; ?>
			<?php include "_/components/php/footer.php"; ?>
<!--
		</div>
	</div>
-->
	
	<script src="_/js/aboutTiles.js"></script>
	<script src="_/js/jquery.easypiechart.js"></script>
	<script src="_/js/nlform.js"></script>
	<script>
		var nlform = new NLForm( document.getElementById( 'nl-form' ) );
	</script>
	<script>
		$('#about-more').click(function(){
			if ( $('html').hasClass('no-touch') ) {
				$('#chart-quantity').easyPieChart({
		            //your options goes here
		            barColor: 'rgba(0,0,0,0.25)',
		            trackColor: 'rgba(0,0,0,0.1)',
		            scaleColor: false,
		            lineCap: 'round',
		            lineWidth: 5,
		            size: $('#content-2').children('.column-right').height() - 25,
		            animate: { duration: 1500, enabled: true },
		            easing: 'easeInOutQuart',
		            
		            onStep: function(from, to, currentValue) {
			            $self = $(this.el);
			            $('#quantity-label').html(~~( $self.attr('data-value') * currentValue / $self.attr('data-percent') ) );
		            }
		        });
		        
		        $('#chart-mass').easyPieChart({
		            //your options goes here
		            barColor: 'rgba(0,0,0,0.25)',
		            trackColor: 'rgba(0,0,0,0.1)',
		            scaleColor: false,
		            lineCap: 'round',
		            lineWidth: 5,
		            size: $('#content-2').children('.column-right').height() - 25,
		            animate: { duration: 1500, enabled: true },
		            easing: 'easeInOutQuart',
		            
		            onStep: function(from, to, currentValue) {
			            $self = $(this.el);
			            $('#mass-label').html( ($self.attr('data-value') * currentValue / $self.attr('data-percent')).toFixed(4) );
		            }
		        });
	        } else {
		        var chartQuanityStarted = false,
		        	chartMassStarted = false;
		        $(window).scroll(function(){
			        if ( isInView($('#chart-quantity')[0]) && chartQuanityStarted == false ) {
				        chartQuanityStarted = true;
				        $('#chart-quantity').easyPieChart({
				            //your options goes here
				            barColor: 'rgba(0,0,0,0.25)',
				            trackColor: 'rgba(0,0,0,0.1)',
				            scaleColor: false,
				            lineCap: 'round',
				            lineWidth: 5,
				            size: window.innerWidth - 25,
				            animate: { duration: 1500, enabled: true },
				            easing: 'easeInOutQuart',
				            
				            onStep: function(from, to, currentValue) {
					            $self = $(this.el);
					            $('#quantity-label').html(~~( $self.attr('data-value') * currentValue / $self.attr('data-percent') ) );
				            }
				        });
			        }
			        
			        if ( isInView($('#chart-mass')[0]) && chartMassStarted == false ) {
				        chartMassStarted = true;
				        $('#chart-mass').easyPieChart({
				            //your options goes here
				            barColor: 'rgba(0,0,0,0.25)',
				            trackColor: 'rgba(0,0,0,0.1)',
				            scaleColor: false,
				            lineCap: 'round',
				            lineWidth: 5,
				            size: window.innerWidth - 25,
				            animate: { duration: 1500, enabled: true },
				            easing: 'easeInOutQuart',
				            
				            onStep: function(from, to, currentValue) {
					            $self = $(this.el);
					            $('#mass-label').html( ($self.attr('data-value') * currentValue / $self.attr('data-percent')).toFixed(4) );
				            }
				        });
			        }
		        });
	        }
		});
		
		function isInView(element) {
			var top = element.offsetTop;
			var left = element.offsetLeft;
			var width = element.offsetWidth;
			var height = element.offsetHeight;
			
			while(element.offsetParent) {
			element = element.offsetParent;
			top += element.offsetTop;
			left += element.offsetLeft;
			}
			
			return (
			top < (window.pageYOffset + window.innerHeight) &&
			left < (window.pageXOffset + window.innerWidth) &&
			(top + height) > window.pageYOffset &&
			(left + width) > window.pageXOffset
			);
		}
	</script>
</body>
</html>
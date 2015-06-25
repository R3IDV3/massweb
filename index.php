<!DOCTYPE html>
<html>
<head>
	<title>MassBase -- Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
    <!<link href="_/css/mystyles.css" rel="stylesheet" media="screen">
    <link href="_/css/style.css" rel="stylesheet" media="screen">
</head>
<body id="home">
	<?php include "_/components/php/header.php"; ?>
	<?php include '_/components/php/content-home.php'; ?>
	<?php include "_/components/php/nl-search.php"; ?>
	<?php include "_/components/php/footer.php"; ?>  

	<!--<script src="_/js/bootstrap.js"></script>-->
	<script src="_/js/nlform.js"></script>
		<script>
			var nlform = new NLForm( document.getElementById( 'nl-form' ) );
		</script>
    <script src="_/js/myscript.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="_/js/jquery.easing.1.3.js"></script>
    <!-- Easing Anchor Effect -->
    <script>
    	$(function() {
			$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 1500, 'easeOutElastic');
						return false;
					}
				}
			});
		});
    </script>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['searchterm']; ?> -- Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_/css/style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "_/components/php/mp-menu-browse.php"; ?>
<!--
	<div class="mp-content-wrapper">
		<div class="mp-content">
-->
	        <main>
	            <?php include "_/components/php/resultsHeader.php"; ?>
				<?php include "_/components/php/outputResults.php"; ?>
			</main>
	        <?php include "_/components/php/footer.php"; ?>
<!--
		</div>
	</div>
-->
    
    <script src="_/js/persist.js"></script>
	<script>
		function openSpePg(el) {
			
			$("#specimen-modal")
				.find('#specimen-modal-content')
					.children()
						.css('visibility', 'hidden')
						.end();
				
			var t;
			clearTimeout(t);
			t = setTimeout(function(){
				$('#specimen-modal')
					.find('.loading-anim')
						.css('visibility', 'visible');
			}, 500);
			
	/*
			var tt;
			clearTimeout(tt);
			tt = setTimeout(function(){
	*/
			
			var id = $(el).attr('data-process-id');
			
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            	
	            	clearTimeout(t); // don't display the loading animation
	            	
	            	$('#specimen-modal')
	            		.find('#specimen-modal-content')
	            			.html(xmlhttp.responseText)
	            			.end()
	            		.find('.loading-anim')
	            			.css('visibility', 'hidden');
	            }
	        }
	        xmlhttp.open("GET","specimenpage.php?id=" + id, true);
	        xmlhttp.send();
	        
	        // set a delegated click event on the already-existing .modal to any new .md-switches
	        $('#specimen-modal').on('click', '.md-switch', function(){
				$(this).parents('.modal').find('.back').removeClass('show');
				$(this).parents('.modal').removeClass('open');
				$( '#' + $(this).attr('data-modal') ).addClass('open');
				$( '#' + $(this).attr('data-modal') ).find('.back').addClass('show').attr('data-modal', $(this).parents('.modal').attr('id'));
			});
			
	/* 		}, 2000); */
		}
	</script>
	<script src="_/js/filler.js"></script>
</body>
</html>
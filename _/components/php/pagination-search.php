<?php if($count > 50): ?>

	<?php 
		$condition = ($count % 50) == 0 ? floor($count/50) : floor($count/50) + 1; // account for results in even multiples of 50
		
		function linkToPg($page) {
			return 'results.php?searchterm=' . $_GET['searchterm'] .
				'&searchby=' . $_GET['searchby'] . 
				'&sortby=' . $_GET['sortby'] . 
				'&greaterchoice=' . $_GET['greaterchoice'] . 
				'&greaterthan=' . $_GET['greaterthan'] . 
				'&lessthanchoice=' . $_GET['lessthanchoice'] . 
				'&lessthan=' . $_GET['lessthan'] . 
				'&page=' . $page;
		}
	?>

	<ul class="pagination">
		
		<a href="<?php echo linkToPg(1) ?>"><li>First</li></a>

		<!-- disable prev button if on first page -->
		<?php if($_GET['page'] == 1): ?>
			<li class="previous disabled"><i class="fa fa-arrow-left"></i></li>
		<?php else: ?>
			<a href="<?php echo linkToPg($_GET['page'] - 1) ?>"><li class="previous"><i class="fa fa-arrow-left"></i></li></a>
		<?php endif; ?>


		<?php for($i = 1; $i <= $condition; $i++): ?>
	  
			<!-- only output 1-5 for first 5 pages -->
			<?php if($_GET['page'] <= 5 AND $i <= 5): ?>
				<?php if($i == $_GET['page']): ?>
					<a href="<?php echo linkToPg($i) ?>"><li class="active"><?php echo $i; ?></li></a>
				<?php else: ?>
					<a href="<?php echo linkToPg($i) ?>"><li><?php echo $i; ?></li></a>		
				<?php endif; ?>
			
			<!-- show 2 on either side of current page when not within the last 2 pages -->
			<?php elseif($_GET['page'] > 5 AND ($i >= $_GET['page'] - 2 AND $i <= $_GET['page'] + 2) AND $_GET['page'] <= $condition - 2): ?>
				<?php if($i == $_GET['page']): ?>
					<a href="<?php echo linkToPg($i) ?>"><li class="active"><?php echo $i; ?></li></a>
				<?php else: ?>
					<a href="<?php echo linkToPg($i) ?>"><li><?php echo $i; ?></li></a>
				<?php endif; ?>

			<!-- only output N-5 to N for last 2 pages -->
			<?php elseif(($_GET['page'] > 5) AND ($_GET['page'] >= $condition - 2) AND ($i >= $condition - 4)): ?>
				<?php if($i == $_GET['page']): ?>
					<a href="<?php echo linkToPg($i) ?>"><li class="active"><?php echo $i; ?></li></a>
				<?php else: ?>
					<a href="<?php echo linkToPg($i) ?>"><li><?php echo $i; ?></li></a>
				<?php endif; ?>
			<?php endif; ?>

		<?php endfor; ?>

		<!-- disable next button if on last page -->
		<?php if($_GET['page'] == $condition): ?>
			<li class="next disabled"><i class="fa fa-arrow-right"></i></li>
		<?php else: ?>
			<a href="<?php echo linkToPg($_GET['page'] + 1) ?>"><li class="next"><i class="fa fa-arrow-right"></i></li></a>	
		<?php endif; ?>
		
		<a href="<?php echo linkToPg($condition) ?>"><li>Last</li></a>
		
	</ul>

<?php endif; ?>
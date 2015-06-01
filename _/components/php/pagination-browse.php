<?php if($count > 50): ?>

	<!-- account for results in even multiples of 50 -->
	<?php 
		if(($count % 50) == 0)
		{
			$condition = floor($count/50);
		}
		else
		{
			$condition = (floor($count/50) + 1);
		}
	?>

	<ul class="pagination">
		<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=1"> First</a></li>

		<!-- disable prev button if on first page -->
		<?php if($_GET['page'] == 1): ?>
			<li class="disabled"><a>&laquo; Prev</a></li>
		<?php else: ?>
			<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $_GET['page'] - 1; ?>">&laquo; Prev</a></li>
		<?php endif; ?>


		<?php for($i = 1; $i <= $condition; $i++): ?>
	  
	  		<!-- only output 1-5 for first 5 pages -->
	  		<?php if($_GET['page'] <= 5 AND $i <= 5): ?>
		  		<?php if($i == $_GET['page']): ?>
		  			<li class="active"><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php else: ?>
		  			<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php endif; ?>
		  	<!-- show 2 on either side of current page when not within the last 2 pages -->
		  	<?php elseif($_GET['page'] > 5 AND ($i >= $_GET['page'] - 2 AND $i <= $_GET['page'] + 2) AND $_GET['page'] <= $condition - 2): ?>
		  		<?php if($i == $_GET['page']): ?>
		  			<li class="active"><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php else: ?>
		  			<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php endif; ?>
		  	<!-- only output N-5 to N for last 2 pages -->
		  	<?php elseif(($_GET['page'] > 5) AND ($_GET['page'] >= $condition - 2) AND ($i >= $condition - 5)): ?>
		  		<?php if($i == $_GET['page']): ?>
		  			<li class="active"><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php else: ?>
		  			<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  		<?php endif; ?>
		  	<?php endif; ?>

	  	<?php endfor; ?>

	  	<!-- disable next button if on last page -->
		<?php if($_GET['page'] == $condition): ?>
			<li class="disabled"><a> Next &raquo;</a></li>
		<?php else: ?>
			<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $_GET['page'] + 1; ?>"> Next &raquo;</a></li>
		<?php endif; ?>
		<li><a href="browseresults.php?<?php if(isset($_GET['searchterm'])){echo 'searchterm='.$_GET['searchterm'].'&';} ?><?php if(isset($_GET['sortby'])){echo 'sortby='.$_GET['sortby'].'&';} ?>searchby=<?php echo $_GET['searchby']; ?>&page=<?php echo $condition; ?>"> Last</a></li>
	</ul>

<?php endif; ?>
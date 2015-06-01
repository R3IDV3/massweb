<!DOCTYPE html>

<legend>
	<div class="row-fluid">
		<?php 
			if(count($results) > 0)
			{
				echo "Showing " . count($results) . " results of " . $count . " for \"";
			}
			else
			{
				echo "0 results for \"";
			}
			
			if(strlen($searchTerm) < 30)
			{
				echo $searchTerm . "\"";
			}
			else
			{
				echo substr($searchTerm, 0, 30) . "...\"";
			}
		?>
		<?php if(count($results) > 0): ?>
			<a href="search.php" class="btn btn-xs btn-danger pull-right" role="button" style"align:right"> Search Again </a>
			<a class="btn btn-xs btn-warning pull-right" style="margin-right:10px" href="_/components/php/script-print.php?searchby=<?php echo $searchBy; ?>&id=<?php echo $id; ?>" type="button" value="<?php echo $searchTerm; ?>"> Print CSV</a>
		<?php endif; ?>
	</div>
</legend>

<?php 

if(count($results) == 0)
{
	echo "Sorry, but nothing matched your search criteria. Please try again with different keywords.<br><br>";
}
else
{
	include 'table-results.php';
}
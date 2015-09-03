<!DOCTYPE html>

<section>
	<div id="persistant-search-summary">
	</div>
	<div class="search-summary">
		<?php 
			if(count($results) > 0)
			{
				echo "<h1>Showing " . count($results) . " results of " . $count . " for \"";
			}
			else
			{
				echo "<h1>0 results for \"";
			}
			
			if(strlen($searchTerm) < 30)
			{
				echo $searchTerm . "\"</h1>";
			}
			else
			{
				echo substr($searchTerm, 0, 30) . "...\"</h1>";
			}
		?>
		<?php if(count($results) > 0): ?>
			<div class="summary-buttons">
				<a class="button small" href="index.php#search">Search Again</a>&nbsp;&nbsp;
				<a class="button small" style="margin-right:10px" href="_/components/php/script-print.php?searchby=<?php echo $searchBy; ?>&id=<?php echo $id; ?>" type="button" value="<?php echo $searchTerm; ?>">Print CSV</a>
			</div>
		<?php endif; ?>
	</div>
	
	<?php 
	
	if(count($results) == 0)
	{
		echo '<div class="no-results-wrapper"><article class="no-results">Sorry, but nothing matched your search criteria. Please <a class="link" href="index.php#search">try again</a> with different keywords.</article></div>';
	}
	else
	{
		include 'table-results.php';
	}
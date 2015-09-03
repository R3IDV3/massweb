<!DOCTYPE html>

<?php
	
	function sortLink($heading) {
	/**
	 * Return a string containing the url that the headings will 
	 * link to, to display the current table with appropriate 
	 * sorting
	 *
	 * @param string $heading :	a string containing the heading 
	 * 							prefix by which to sort the table
	 */
		return "results.php?searchterm=" . $_GET['searchterm'] . 
				"&searchby=" . $_GET['searchby'] . 
				"&sortby=" . toggleSortLink($heading) . 
				"&greaterchoice=" . $_GET['greaterchoice'] . 
				"&greaterthan=" . $_GET['greaterthan'] . 
				"&lessthanchoice=" . $_GET['lessthanchoice'] . 
				"&lessthan=" . $_GET['lessthan'] . 
				"&page=" . $_GET['page'];
	}
	 
	function toggleSortLink($sortby) {
	/**
	 * Return a string containing the sort abbreviation 
	 * appended to $sortby
	 *
	 * @param string $sortby :	a string containing the heading 
	 * 							prefix by which to sort the table
	 */
		return 
			strcmp($_GET['sortby'], $sortby . "asc") == 0 
				? // if the sort is already asc
					$sortby . "desc" 
				: // if the sort is already desc or not set yet
					$sortby . "asc"
		;
	}
	
	function toggleSortIcon($sortby, $type = "alpha") {
	/**
	 * Return a string containing the HTML for the sort icon
	 *
	 * @param string $sortby :	a string containing the heading 
	 * 							prefix by which the table is sorted
	 * @param string $type :	a string containing the heading's 
	 *							data type
	 */
		return 
			strcmp($_GET['sortby'], $sortby . "asc") == 0 
				? // if the table is sorted ascending by this column
					'<i class="fa fa-sort-' . $type . '-asc"></i>' 
				: // if the table is sorted descending by this column or not sorted by this column
					( 
						strcmp($_GET['sortby'], $sortby . "desc") == 0 
							? // if the table is sorted descending by this column
								'<i class="fa fa-sort-' . $type . '-desc"></i>' 
							: // if the table is not sorted by this column
								'' 
					)
		;
	}
?>

<article class="results-table">
	<table id="persistant-thead">
	</table>
	<table>
		<thead class="persist">
			<tr>
				<th><a class="link" href="<?php echo sortLink("pid"); ?>">Process ID&nbsp;&nbsp;<?php echo toggleSortIcon("pid"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("bin"); ?>">BIN&nbsp;&nbsp;<?php echo toggleSortIcon("bin"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("phy"); ?>">Phylum&nbsp;&nbsp;<?php echo toggleSortIcon("phy"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("cla"); ?>">Class&nbsp;&nbsp;<?php echo toggleSortIcon("cla"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("ord"); ?>">Order&nbsp;&nbsp;<?php echo toggleSortIcon("ord"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("fam"); ?>">Family&nbsp;&nbsp;<?php echo toggleSortIcon("fam"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("gen"); ?>">Genus&nbsp;&nbsp;<?php echo toggleSortIcon("gen"); ?></a></th>
				<th><a class="link" href="<?php echo sortLink("spe"); ?>">Species&nbsp;&nbsp;<?php echo toggleSortIcon("spe"); ?></a></th>
				<th class="number"><a class="link" href="<?php echo sortLink("mass"); ?>">Mass (mg)&nbsp;&nbsp;<?php echo toggleSortIcon("mass", "numeric"); ?></a></th>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 0; $i < count($results); $i++): ?>
				<tr class="md-trigger" data-modal="specimen-modal" onclick="openSpePg(this)" data-process-id="<?php echo $results[$i]['process_id']; ?>">
				  	<td><?php echo $results[$i]['process_id']; ?></td>
				  	<td><?php echo $results[$i]['bin_id_bold']; ?></td>
				  	<td><?php echo $results[$i]['phylum']; ?></td>
				    <td><?php echo $results[$i]['class']; ?></td>
				    <td><?php echo $results[$i]['order']; ?></td>
				    <td><?php echo $results[$i]['family']; ?></td>
				    <td><?php echo $results[$i]['genus']; ?></td>
				    <td><?php echo $results[$i]['species']; ?></td>
				    <?php if($results[$i]['weight'] < 0): ?>
				    	<td class="number">0.0<sup>*</sup></td>
				    <?php else: ?>
				    	<td class="number"><?php echo number_format($results[$i]['weight'], 1); ?></td>
				    <?php endif; ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</article><!-- search results table -->

<?php if(strcmp($_GET['searchby'], "class") == 0 OR strcmp($_GET['searchby'], "order") == 0 OR strcmp($_GET['searchby'], "family") == 0 OR strcmp($_GET['searchby'], "genus") == 0 OR strcmp($_GET['searchby'], "species") == 0): ?> <!-- if table-results.php is being accessed by "Browse" -->
	<div class="text-center">
		<?php include 'pagination-browseresults.php'; ?>
	</div>
<?php else: ?> <!-- if table-results.php is being accessed by "Search" -->
	<div id="pagination">
		<?php include 'pagination-search.php'; ?>
	</div>
<?php endif; ?>
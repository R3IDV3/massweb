<!DOCTYPE html>
<div class="table-responsive">
	<table class="table table-striped table-condensed table-hover table-bordered">
		<thead>
			<tr>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"pidasc") == 0)
						{
							echo "piddesc";
						}
						else
						{
							echo "pidasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Process ID
					<?php if(strcmp($_GET['sortby'],"pidasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"piddesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"binasc") == 0)
						{
							echo "bindesc";
						}
						else
						{
							echo "binasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					BIN 
					<?php if(strcmp($_GET['sortby'],"binasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"bindesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"phyasc") == 0)
						{
							echo "phydesc";
						}
						else
						{
							echo "phyasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Phylum 
					<?php if(strcmp($_GET['sortby'],"phyasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"phydesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"claasc") == 0)
						{
							echo "cladesc";
						}
						else
						{
							echo "claasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Class 
					<?php if(strcmp($_GET['sortby'],"claasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"cladesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"ordasc") == 0)
						{
							echo "orddesc";
						}
						else
						{
							echo "ordasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Order 
					<?php if(strcmp($_GET['sortby'],"ordasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"orddesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"famasc") == 0)
						{
							echo "famdesc";
						}
						else
						{
							echo "famasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Family 
					<?php if(strcmp($_GET['sortby'],"famasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"famdesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"genasc") == 0)
						{
							echo "gendesc";
						}
						else
						{
							echo "genasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Genus 
					<?php if(strcmp($_GET['sortby'],"genasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"gendesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"speasc") == 0)
						{
							echo "spedesc";
						}
						else
						{
							echo "speasc";
						}
					?>&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Species 
					<?php if(strcmp($_GET['sortby'],"speasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"spedesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
				<th>
					<a href="results.php?searchterm=<?php echo $_GET['searchterm']; ?>&searchby=<?php echo $_GET['searchby']; ?>&sortby=
					<?php
						if(strcmp($_GET['sortby'],"massasc") == 0)
						{
							echo "massdesc";
						}
						else
						{
							echo "massasc";
						}
					?>
					&greaterchoice=<?php echo $_GET['greaterchoice']; ?>&greaterthan=<?php echo $_GET['greaterthan']; ?>&lessthanchoice=<?php echo $_GET['lessthanchoice']; ?>&lessthan=<?php echo $_GET['lessthan']; ?>&page=<?php echo $_GET['page']; ?>">
					Mass (mg) 
					<?php if(strcmp($_GET['sortby'],"massasc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-down"></span></a>
					<?php elseif(strcmp($_GET['sortby'],"massdesc") == 0): ?>
						<span class="glyphicon glyphicon-chevron-up"></span></a>
					<?php else: ?>
						</a>
					<?php endif; ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 0; $i < count($results); $i++): ?>
				<tr>
				  	<td><a href="specimenpage.php?id=<?php echo $results[$i]['process_id']; ?>" class="btn btn-success btn-xs" role="button" onclick="window.open('specimenpage.php?id=<?php echo $results[$i]['process_id']; ?>', 'newwindow', 'width=770, height=730'); return false;"><?php echo $results[$i]['process_id']; ?></a></td>
				  	<td><?php echo $results[$i]['bin_id_bold']; ?></td>
				  	<td><?php echo $results[$i]['phylum']; ?></td>
				    <td><?php echo $results[$i]['class']; ?></td>
				    <td><?php echo $results[$i]['order']; ?></td>
				    <td><?php echo $results[$i]['family']; ?></td>
				    <td><?php echo $results[$i]['genus']; ?></td>
				    <td><?php echo $results[$i]['species']; ?></td>
				    <?php if($results[$i]['weight'] < 0): ?>
				    	<td>0.0<sup>*</sup></td>
				    <?php else: ?>
				    	<td><?php echo number_format($results[$i]['weight'], 1); ?></td>
				    <?php endif; ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</div><!-- search results table -->

<?php if(strcmp($_GET['searchby'], "class") == 0 OR strcmp($_GET['searchby'], "order") == 0 OR strcmp($_GET['searchby'], "family") == 0 OR strcmp($_GET['searchby'], "genus") == 0 OR strcmp($_GET['searchby'], "species") == 0): ?>
	<div class="text-center">
		<?php include 'pagination-browseresults.php'; ?>
	</div>
<?php else: ?>
	<div class="text-center">
		<?php include 'pagination-search.php'; ?>
	</div>
<?php endif; ?>
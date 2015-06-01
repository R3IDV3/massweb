<legend><h4><?php echo $title; ?> Results -- <?php echo $count; ?> Distinct <?php echo $plural ?></h4></legend>

<!-- all tables that aren't from heaviest or lightest -->
<?php if(strcmp($title, "Heaviest") <> 0 AND strcmp($title, "Lightest") <> 0): ?>
	<div class="table-responsive">
		<table class="table table-striped table-condensed table-hover table-bordered">
			<thead>
				<tr>
					<th>
						<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
						<?php
							if(strcmp($_GET['sortby'],"nameasc") == 0)
							{
								echo "namedesc";
							}
							else
							{
								echo "nameasc";
							}
						?>&page=<?php echo $_GET['page']; ?>">
						Name
						<?php if(strcmp($_GET['sortby'],"namedesc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-down"></span></a>
						<?php elseif(strcmp($_GET['sortby'],"nameasc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-up"></span></a>
						<?php else: ?>
							</a>
						<?php endif; ?>
					</th>
					<th>
						<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
						<?php
							if(strcmp($_GET['sortby'],"nsasc") == 0)
							{
								echo "nsdesc";
							}
							else
							{
								echo "nsasc";
							}
						?>&page=<?php echo $_GET['page']; ?>">
						Number of Specimens
						<?php if(strcmp($_GET['sortby'],"nsdesc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-down"></span></a>
						<?php elseif(strcmp($_GET['sortby'],"nsasc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-up"></span></a>
						<?php else: ?>
							</a>
						<?php endif; ?>
					</th>
					<th>
						<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
						<?php
							if(strcmp($_GET['sortby'],"avgasc") == 0)
							{
								echo "avgdesc";
							}
							else
							{
								echo "avgasc";
							}
						?>&page=<?php echo $_GET['page']; ?>">
						Avg Mass(mg)
						<?php if(strcmp($_GET['sortby'],"avgdesc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-down"></span></a>
						<?php elseif(strcmp($_GET['sortby'],"avgasc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-up"></span></a>
						<?php else: ?>
							</a>
						<?php endif; ?>
					</th>
					<th>
						<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
						<?php
							if(strcmp($_GET['sortby'],"minasc") == 0)
							{
								echo "mindesc";
							}
							else
							{
								echo "minasc";
							}
						?>&page=<?php echo $_GET['page']; ?>">
						Min Mass (mg)
						<?php if(strcmp($_GET['sortby'],"mindesc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-down"></span></a>
						<?php elseif(strcmp($_GET['sortby'],"minasc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-up"></span></a>
						<?php else: ?>
							</a>
						<?php endif; ?>
					</th>
            		<th>
            			<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
						<?php
							if(strcmp($_GET['sortby'],"maxasc") == 0)
							{
								echo "maxdesc";
							}
							else
							{
								echo "maxasc";
							}
						?>&page=<?php echo $_GET['page']; ?>">
            			Max Mass (mg)
            			<?php if(strcmp($_GET['sortby'],"maxdesc") == 0): ?>
							<span class="glyphicon glyphicon-chevron-down"></span></a>
						<?php elseif(strcmp($_GET['sortby'],"maxasc") == 0): ?>
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
							<td><a href="browseresults.php?searchterm=<?php echo $results[$i]['id']; ?>&searchby=<?php echo strtolower($title); ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $results[$i][$value]; ?></a></td>
							<td><?php echo $results[$i]['NUM']; ?></td>
							<?php if($results[$i]['avg'] < 0): ?>
			                	<td>0.0 <sup> *</sup></td>
			                <?php else: ?>
			                	<td><?php echo number_format($results[$i]['avg'], 1); ?></td>
			                <?php endif; ?>
							<?php if($results[$i]['min'] < 0): ?>
			                  	<td>0.0<sup>*</sup></td>
			                <?php else: ?>
			                 	<td><?php echo number_format($results[$i]['min'], 1); ?></td>
			                <?php endif; ?>
			                <?php if($results[$i]['max'] < 0): ?>
			                  	<td>0.0 <sup> *</sup></td>
			                <?php else: ?>
			                  	<td><?php echo number_format($results[$i]['max'], 1); ?></td>
			                <?php endif; ?>
						</tr>
				<?php endfor; ?>

			</tbody>
		</table>
	</div><!-- table-responsive --><!-- all tables that aren't from heaviest or lightest -->
<?php else: ?><!-- heaviest and lightest -->
	<div class="table-responsive">
	  <table class="table table-striped table-condensed table-hover table-bordered">
	    <thead>
	      <tr>
	        <th>
	        	<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
				<?php
					if(strcmp($_GET['sortby'],"speasc") == 0)
					{
						echo "spedesc";
					}
					else
					{
						echo "speasc";
					}
				?>&page=<?php echo $_GET['page']; ?>">
        		Species
        		<?php if(strcmp($_GET['sortby'],"spedesc") == 0): ?>
					<span class="glyphicon glyphicon-chevron-down"></span></a>
				<?php elseif(strcmp($_GET['sortby'],"speasc") == 0): ?>
					<span class="glyphicon glyphicon-chevron-up"></span></a>
				<?php else: ?>
					</a>
				<?php endif; ?>
	        </th>
	        <th>
	        	<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
				<?php
					if(strcmp($_GET['sortby'],"pidasc") == 0)
					{
						echo "piddesc";
					}
					else
					{
						echo "pidasc";
					}
				?>&page=<?php echo $_GET['page']; ?>">
	        	Process ID
	        	<?php if(strcmp($_GET['sortby'],"piddesc") == 0): ?>
					<span class="glyphicon glyphicon-chevron-down"></span></a>
				<?php elseif(strcmp($_GET['sortby'],"pidasc") == 0): ?>
					<span class="glyphicon glyphicon-chevron-up"></span></a>
				<?php else: ?>
					</a>
				<?php endif; ?>
	        </th>
	        <th>
	        	<a href="browseresults.php?searchby=<?php echo $_GET['searchby']; ?>&sortby=
				<?php
					if(strcmp($_GET['sortby'],"massasc") == 0)
					{
						echo "massdesc";
					}
					else
					{
						echo "massasc";
					}
				?>&page=<?php echo $_GET['page']; ?>">
	        	Mass (mg)
	        	<?php if(strcmp($_GET['sortby'],"massdesc") == 0): ?>
					<span class="glyphicon glyphicon-chevron-down"></span></a>
				<?php elseif(strcmp($_GET['sortby'],"massasc") == 0): ?>
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
	            <td><?php echo $results[$i]['name']; ?></td>
	            <td><a href="specimenpage.php?id=<?php echo $results[$i]['process_id']; ?>" class="btn btn-success btn-xs" target="_blank" role="button" onclick="window.open('specimenpage.php?id=<?php echo $results[$i]['process_id']; ?>', 'newwindow', 'width=770, height=730'); return false;"><?php echo $results[$i]['process_id']; ?></a></td>
	            <?php if($results[$i]['weight'] < 0): ?>
			    	<td>0.0<sup>*</sup></td>
			    <?php else: ?>
			    	<td><?php echo number_format($results[$i]['weight'], 1); ?></td>
			    <?php endif; ?>
	          </tr>
	      <?php endfor; ?>
	    </tbody>
	  </table>
	</div><!-- table-responsive -->
<?php endif; ?>

<?php if(strcmp($_GET['searchby'], "class") == 0 OR strcmp($_GET['searchby'], "order") == 0 OR strcmp($_GET['searchby'], "family") == 0 OR strcmp($_GET['searchby'], "genus") == 0 OR strcmp($_GET['searchby'], "species") == 0): ?>
	<div class="text-center">
		<?php include 'pagination-browseresults.php'; ?>
	</div>
<?php else: ?>
	<div class="text-center">
		<?php include 'pagination-browse.php'; ?>
	</div> <!-- pagination section -->
<?php endif; ?>
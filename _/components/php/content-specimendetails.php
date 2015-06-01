<?php if(count($specimen) > 0): ?>
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="col col-sm-10">
				<h4 class="panel-title"><?php echo "Specimen " . $specimen['process_id'] . " - " . $highestTax; ?></h4>
			</div>
			<div class="col col-sm-2 clearfix">
				<a class="btn btn-sm btn-success pull-right" href="_/components/php/script-print.php?searchby=specimen&id=<?php echo $specimen['process_id']; ?>" type="button" value="<?php echo $specimen['process_id']; ?>"> PRINT CSV</a>
			</div><!-- col-sm-2 -->
		</div><!-- panel heading -->
	  	<div class="panel-body clearfix">
	  		<section class="col col-sm-6"><!-- left section -->
	  			<div class="col col-sm-12 alert alert-info">
				   	SPECIMEN INFO
				</div><!-- alert -->
		  		<div class="col col-sm-6"><!-- Left heading column -->
		  			<p><strong>Process ID: </strong></p>
		  			<?php if(strcmp($specimen['bin_id_bold'],"") != 0): ?>
		  				<p><strong>BIN: </strong></p>
		  			<?php endif; ?>
		  			<p><strong>Mass: </strong></p>
		  			<p><strong>Std. Deviation: </strong></p>
		  			<p><strong>Date Weighed: </strong></p>
		  			<p><strong>Balance: </strong></p>
		  			<p><strong>Reference: </strong></p>
			    </div><!-- Left heading column --> 
			    <section class="col col-sm-6"><!-- Left content column -->
			  		<p><?php echo $specimen['process_id']; ?></p>
			  		<!-- account for empty string in BIN -->
			  		<?php if(strcmp($specimen['bin_id_bold'],"") != 0): ?>
			  			<p><?php echo $specimen['bin_id_bold']; ?></p>
			  		<?php endif; ?>
			  		<!-- Account for negative weights -->
			  		<?php if($specimen['weight'] < 0): ?>
			  			<p>0.0* mg</p>
			  		<?php else: ?>
			  			<?php if(strcmp($specimen['scale'], "XP6U")): ?>
			  				<p><?php echo round($specimen['weight'],4) . " mg"; ?></p>
			  			<?php else: ?>
			  				<p><?php echo round($specimen['weight'],1) . " mg"; ?></p>
			  			<?php endif; ?>
			  		<?php endif; ?>
			  		<p><?php echo $specimen['standard_deviation']; ?> mg</p>
			  		<!-- Account for unknown dates -->
			  		<?php if(strcmp($specimen['weigh_date'],"0000-00-00") == 0): ?>
			  			<p><br></p>
			  		<?php else: ?>
			  			<p><?php echo $specimen['weigh_date']; ?></p>
			  		<?php endif; ?>
			  		<p><?php echo $specimen['scale']; ?></p>
			  		<p><a href="references.php" target="_blank"><?php echo $specimen['project']; ?></a></p>
			    </section><!-- Left Info column -->
			</section><!-- left section -->
			<section class="col col-sm-6"><!-- Right Taxonomy column -->
				<div class="col col-sm-12 alert alert-success">
				   	TAXONOMY
				</div><!-- alert -->
			    <div class="col col-sm-5"><!-- Right heading column -->
					<p><strong>Phylum: </strong></p>
					<p><strong>Class: </strong></p> 
					<p><strong>Order: </strong></p> 
					<p><strong>Family: </strong></p> 
					<p><strong>Subfamily: </strong></p> 
					<p><strong>Genus: </strong></p> 
					<p><strong>Species: </strong></p>  	
			    </div><!-- Right heading column -->
			    <div class="col col-sm-7"><!-- Right content column -->
			  		<p><?php echo $specimen['phylum']; ?></p>
			  		<p><?php echo $specimen['class']; ?></p>
			  		<p><?php echo $specimen['order']; ?></p>
			  		<p><?php echo $specimen['family']; ?></p>
			  		<p><?php echo $specimen['subfamily']; ?></p>
			  		<p><?php echo $specimen['genus']; ?></p>
			  		<p><i><?php echo $specimen['species']; ?></i></p>
			  		<br>
			    </div><!-- Right content column -->
			</section> <!-- Right Taxonomy column -->

		  	<section class="col col-sm-12"><!-- Bottom section -->
		  		<div class="col col-sm-12 alert alert-warning">
				   	NOTES
				</div><!-- alert -->
		  		<div class="col col-sm-3"><!-- Notes Section headings -->
		  			<p><strong>Voucher Condition: </strong></p>
		  			<p><strong>Specimen Notes: </strong></p>
		  			<br>
			    </div><!-- Notes section headings --> 
			    <section class="col col-sm-9"><!-- Notes section info--> 
			  		<p><?php echo $specimen['drying']; ?></p>
			  		<p><?php echo $specimen['specimen_notes']; ?></p>
			  		<br>
			    </section><!-- Notes section info --> 
				<div class="col col-sm-12 alert alert-danger">
				   	LINKS AND MEDIA
				</div><!-- alert -->
				<div class="col col-sm-2"><!-- Links section headings --> 	
					<p><strong>Links: </strong></p>
				</div><!-- Notes section headings --> 
				<div class="col col-sm-8"><!-- Notes section info--> 
					<p><a href="http://www.boldsystems.org/index.php/Public_RecordView?processid=<?php echo $specimen['process_id']; ?>" target="_blank">BOLD</a></p>
					<br>
				</div><!-- Notes section info --> 
				<div class="col col-sm-4"><!-- image -->
				    <!-- <a href="#" class="thumbnail">
				     	<img data-src="" alt="IMAGE">
				    </a> -->
				</div><!-- image -->
			</section><!-- bottom section -->
			<div>
				<?php if($specimen['weight'] < 0): ?>
	  				<?php include "_/components/php/content-disclaimerMessage.php"; ?>
	  			<?php endif; ?>
	  		</div>
		</div>
	</div>
<?php else: ?>
	<?php echo "Sorry, but nothing matched your search criteria. Please try again with different process ID.<br><br>"; ?>
<?php endif; ?>

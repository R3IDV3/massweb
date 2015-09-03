<?php if(count($specimen) > 0): ?>
	
	<section>
		<h1 class="panel-title"><?php echo "Specimen " . $specimen['process_id']; ?></h1>
		<h2 class="tax"><?php echo $highestTax; ?></h2>
		<p style="text-align: right;">
			<a class="button small" href="_/components/php/script-print.php?searchby=specimen&id=<?php echo $specimen['process_id']; ?>" type="button" value="<?php echo $specimen['process_id']; ?>">Save CSV</a>
		</p>
		<table>
			<tr>
				<th colspan="4">Specimen Info</th>
			</tr>
			<tr>
				<td>
					<?php echo $specimen['process_id']; ?>
					<div class="sub">Process ID</div>
				</td>
				<?php if(strcmp($specimen['bin_id_bold'],"") != 0): ?>
					<td>
						<?php echo $specimen['bin_id_bold']; ?>
						<div class="sub">BIN</div>
					</td>
				<?php endif; ?>
				<td>
					<?php if($specimen['weight'] < 0): ?>
			  			0.0* mg
			  		<?php else: ?>
			  			<?php if(strcmp($specimen['scale'], "XP6U")): ?>
			  				<?php echo round($specimen['weight'],4) . " mg"; ?>
			  			<?php else: ?>
			  				<?php echo round($specimen['weight'],1) . " mg"; ?>
			  			<?php endif; ?>
			  		<?php endif; ?>
					<div class="sub">Mass</div>
				</td>
				<td>
					<?php echo $specimen['standard_deviation']; ?> mg
					<div class="sub">Standard Deviation</div>
				</td>
			</tr>
			<tr>
				<td>
					<?php if(strcmp($specimen['weigh_date'],"0000-00-00") == 0): ?>
			  			<p> </p>
			  		<?php else: ?>
			  			<?php echo $specimen['weigh_date']; ?>
			  		<?php endif; ?>
					<div class="sub">Date Weighed</div>
				</td>
				<td>
					<?php echo $specimen['scale']; ?>
					<div class="sub">Balance</div>
				</td>
				<td colspan="2">
					<a class="md-switch link" data-modal="projects-modal"><?php echo $specimen['project']; ?></a>
					<div class="sub">Project</div>
				</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<th colspan="4">Taxonomy</th>
			</tr>
			<tr>
				<?php if(strcmp($specimen['phylum'],"") != 0): ?>
					<td>
						<?php echo $specimen['phylum']; ?>
						<div class="sub">Phylum</div>
					</td>
				<?php endif; ?>
				<?php if(strcmp($specimen['class'],"") != 0): ?>
					<td>
						<?php echo $specimen['class']; ?>
						<div class="sub">Class</div>
					</td>
				<?php endif; ?>
				<?php if(strcmp($specimen['order'],"") != 0): ?>
					<td>
						<?php echo $specimen['order']; ?>
						<div class="sub">Order</div>
					</td>
				<?php endif; ?>
				<?php if(strcmp($specimen['family'],"") != 0): ?>
					<td>
						<?php echo $specimen['family']; ?>
						<div class="sub">Family</div>
					</td>
				<?php endif; ?>
			</tr>
			<tr>
				<?php if(strcmp($specimen['subfamily'],"") != 0): ?>
					<td>
						<?php echo $specimen['subfamily']; ?>
						<div class="sub">Subfamily</div>
					</td>
				<?php endif; ?>
				<?php if(strcmp($specimen['genus'],"") != 0): ?>
					<td>
						<?php echo $specimen['genus']; ?>
						<div class="sub">Genus</div>
					</td>
				<?php endif; ?>
				<?php if(strcmp($specimen['species'],"") != 0): ?>
					<td colspan="2">
						<?php echo $specimen['species']; ?>
						<div class="sub">Species</div>
					</td>
				<?php endif; ?>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<th colspan="2">Notes</th>
			</tr>
			<tr>
				<td>
					<?php echo $specimen['drying']; ?>
					<div class="sub">Voucher Condition</div>
				</td>
				<?php if(strcmp($specimen['specimen_notes'], "") != 0): ?>
					<td>
						<?php echo $specimen['specimen_notes']; ?>
						<div class="sub">Specimen Notes</div>
					</td>
				<?php endif; ?>
			</tr>
		</table>
		<br>
		<p>Links: <a href="http://www.boldsystems.org/index.php/Public_RecordView?processid=<?php echo $specimen['process_id']; ?>" target="_blank">BOLD</a></p>
  		
	</section>
	
	<?php if($specimen['weight'] < 0): ?>
		<cite>0.0<sup>*</sup> denotes a mass measurement discrepancy.  See <a class="md-switch link" data-modal="disclaimer-modal">disclaimer</a> for details.</cite>
	<?php endif; ?>

<?php else: ?>
	
	<section>
		<h1>No specimen data found for this record.</h1>
	</section>
	
<?php endif; ?>
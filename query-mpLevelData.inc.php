<?php

include '_/components/php/db.inc.php';

if ( isset($_GET['highesttaxid']) && isset($_GET['taxlevel']) ) { // if we are querying for taxonomy aside from class
	
	$taxLevel = $_GET['taxlevel'];
	$highestTaxId = $_GET['highesttaxid'];
	
	$taxonomy = array( 1 => "class_id", "order_id", "family_id", "subfamily_id", /* "genus_id", */ "species_id");
	
	$newTaxId = $taxonomy[$taxLevel];
	
	$parentTaxId = $taxonomy[$taxLevel - 1];
	
	try {
		$result = $pdo->query("SELECT DISTINCT name, T.id FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T WHERE T.parent_taxon = $highestTaxId AND T.id IN (S.$newTaxId) ORDER BY name");
	} catch(PDOException $e) {
		$error = 'Error retrieving class statistics. ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	
	if ( $newTaxId == "subfamily_id" ) {
		foreach($result as $r) {
			$subfamilyTable[] = array('id' => $r['id'], 'name' => $r['name']);
		}
		
		$newTaxId = "genus_id";
		
		for ($i = 0; $i < sizeof($subfamilyTable); $i++) { // if there are no subfamily, this won't occur, and we go straight to querying for genus under the family
			$highestTaxId = $subfamilyTable[$i]['id'];
			
			try {
				$result = $pdo->query("SELECT DISTINCT name, T.id FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T WHERE T.parent_taxon = $highestTaxId AND T.id IN (S.$newTaxId) ORDER BY name");
			} catch(PDOException $e) {
				$error = 'Error retrieving class statistics. ' . $e->getMessage();
				include 'error.html.php';
				exit();
			}
			
			// append the results from genus into a table
			foreach($result as $r) {
				$table[] = array('id' => $r['id'], 'name' => $r['name']);
			}
		}
		
		try {
			$result = $pdo->query("SELECT DISTINCT name, T.id FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T WHERE T.parent_taxon = $highestTaxId AND T.id IN (S.$newTaxId) ORDER BY name");
		} catch(PDOException $e) {
			$error = 'Error retrieving class statistics. ' . $e->getMessage();
			include 'error.html.php';
			exit();
		}
	} else {
		foreach($result as $r) {
			$table[] = array('id' => $r['id'], 'name' => $r['name']);
		}
	}
	// SELECT DISTINCT name, T.id FROM db.specimen S, db.taxonomy T WHERE T.parent_taxon = $highestTaxId AND T.id IN (S.$newTaxId)
} else {
	try {
		$result = $pdo->query("SELECT DISTINCT name, T.id FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T WHERE T.category_id = 2 AND T.id IN (S.class_id) ORDER BY name");
	} catch(PDOException $e) {
		$error = 'Error retrieving class statistics. ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	// SELECT DISTINCT name, T.id FROM db.specimen S, db.taxonomy T WHERE T.category_id = 2 AND T.id IN (S.class_id)
	foreach($result as $r) {
		$table[] = array('id' => $r['id'], 'name' => $r['name']);
	}
}
?>

<?php if ( sizeof($table) > 0 ): ?>
	<?php if ( $newTaxId ==  "species_id" ): ?>
		<ul>
		<?php for($i = 0; $i < sizeof($table); $i++): ?>
			<a href="results.php?searchby=taxonomy&searchterm=<?php echo $table[$i]['name'] ?>&sortby=binasc&greaterthan=&lessthan=&page=1" title="View All">
			<li data-tax-id="<?php echo $table[$i]['id'] ?>">
				<span class="name"><?php echo $table[$i]['name'] ?></span>
			</li>
			</a>
		<?php endfor; ?>
		</ul>
	<?php else: ?>
		<ul>
		<?php for($i = 0; $i < sizeof($table); $i++): ?>
			<li class="arrow-left" data-tax-id="<?php echo $table[$i]['id'] ?>">
				<span class="name"><?php echo $table[$i]['name'] ?></span>
				<a href="results.php?searchby=taxonomy&searchterm=<?php echo $table[$i]['name'] ?>&sortby=binasc&greaterthan=&lessthan=&page=1">View all</a>
			</li>
		<?php endfor; ?>
		</ul>
	<?php endif; ?>	
<?php else: ?>
	<h1>No Results<br><a class="link" href="results.php?searchby=taxonomy&searchterm=<?php echo $_GET['taxon'] ?>&sortby=binasc&greaterthan=&lessthan=&page=1">View All<br><?php echo $_GET['taxon'] ?></a></h1>
<?php endif; ?>
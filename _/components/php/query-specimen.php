<?php 

include 'db.inc.php';
include 'helper-cleanse.php';

$searchTerm = cleanse($_GET['id']);

try
{

	$sql = 'SELECT S.id, process_id, bin_id_bold, 
			phylum.name as phylum, class.name as class, order_name.name as ord, subfamily.name as subfamily,
			family.name as family, genus.name as genus, species.name as species, 
			weight_minus_pin as weight, project_code as project, standard_deviation,
			project_id, weigh_date, model, specimen_notes, D.type as drying, model
			FROM db189691_massbase.drying_method D, 
			db189691_massbase.scale Sc, db189691_massbase.specimen S
			INNER JOIN db189691_massbase.bin B ON B.id = bin_id
			INNER JOIN db189691_massbase.taxonomy AS phylum ON phylum.id = phylum_id
			INNER JOIN db189691_massbase.taxonomy AS class ON class.id = class_id
			INNER JOIN db189691_massbase.taxonomy AS order_name ON order_name.id = order_id
			INNER JOIN db189691_massbase.taxonomy AS family ON family.id = family_id
			INNER JOIN db189691_massbase.taxonomy AS subfamily ON subfamily.id = subfamily_id
			INNER JOIN db189691_massbase.taxonomy AS genus ON genus.id = genus_id
			INNER JOIN db189691_massbase.taxonomy AS species ON species.id = species_id
			INNER JOIN db189691_massbase.project P ON P.id = project_id
			INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id
			INNER JOIN db189691_massbase.pin Pi ON Pi.id = pin_id
			WHERE scale_id = Sc.id AND D.id = drying_id AND process_id = "' . $searchTerm . '"';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = "Error retrieving specimen info for process id: " . $searchTerm . "<br>" . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
	$specimen = array('id' => $row['id'], 'bin_id_bold' => $row['bin_id_bold'], 'process_id' => $row['process_id'], 
						'phylum' => $row['phylum'], 'class' => $row['class'], 'order' => $row['ord'], 
						'family' => $row['family'], 'subfamily' => $row['subfamily'], 'genus' => $row['genus'], 'species' => $row['species'], 
						'weight' => $row['weight'], 'project' => $row['project'], 'project_id' => $row['project_id'],
						'weigh_date' => $row['weigh_date'], 'scale' => $row['model'], 'specimen_notes' => $row['specimen_notes'],
						'drying' => $row['drying'], 'standard_deviation' => $row['standard_deviation']);
}

$highestTax = "";

if(isset($specimen['phylum']) AND strcmp($specimen['phylum'], "") <> 0)
{
	$highestTax = $specimen['phylum'];
}

if(isset($specimen['class']) AND strcmp($specimen['class'], "") <> 0)
{
	$highestTax = $specimen['class'];
}

if(isset($specimen['order']) AND strcmp($specimen['order'], "") <> 0)
{
	$highestTax = $specimen['order'];
}

if(isset($specimen['family']) AND strcmp($specimen['family'], "") <> 0)
{
	$highestTax = $specimen['family'];
}

if(isset($specimen['subfamily']) AND strcmp($specimen['subfamily'], "") <> 0)
{
	$highestTax = $specimen['subfamily'];
}

if(isset($specimen['genus']) AND strcmp($specimen['genus'], "") <> 0)
{
	$highestTax = $specimen['genus'];
}

if(isset($specimen['species']) AND strcmp($specimen['species'], "") <> 0)
{
	$highestTax = $specimen['species'];
}
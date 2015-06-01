<?php

try
{
 	$sql = 'SELECT COUNT(id) as total, COUNT(DISTINCT phylum_id) as phylum, COUNT(DISTINCT class_id) as class, COUNT(DISTINCT order_id) as ord, COUNT(DISTINCT family_id) as family, 
			COUNT(DISTINCT genus_id) as genus, COUNT(DISTINCT species_id) as species, COUNT(DISTINCT bin_id) as bin, COUNT(DISTINCT project_id) as project, ROUND(sum(weight_minus_pin),3) as weight 
			FROM db189691_massbase.specimen S, db189691_massbase.specimen_mass Sp
			WHERE S.id = specimen_id';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = 'Error retrieving mass base statistics. ' . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
 	$massStats = array('total' => $row['total'], 'phylum' => $row['phylum'],
 						'class' => $row['class'], 'order' => $row['ord'],
 						'family' => $row['family'], 'genus' => $row['genus'],
 						'species' => $row['species'], 'bin' => $row['bin'],
 						'project' => $row['project'], 'weight' => $row['weight']);
}
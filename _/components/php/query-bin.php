<?php

include 'db.inc.php';

if(isset($_GET['searchterm']))
{	
	try
	{
		$sql = 'SELECT S.id, process_id, bin_id_bold, phylum.name as phylum, class.name as class, order_name.name as ord, 
				family.name as family, genus.name as genus, species.name as species, weight_minus_pin as weight, 
				project_code as project
				FROM db189691_massbase.specimen S
				INNER JOIN db189691_massbase.bin B ON B.id = bin_id
				INNER JOIN db189691_massbase.taxonomy AS phylum ON phylum.id = phylum_id
				INNER JOIN db189691_massbase.taxonomy AS class ON class.id = class_id
				INNER JOIN db189691_massbase.taxonomy AS order_name ON order_name.id = order_id
				INNER JOIN db189691_massbase.taxonomy AS family ON family.id = family_id
				INNER JOIN db189691_massbase.taxonomy AS genus ON genus.id = genus_id
				INNER JOIN db189691_massbase.taxonomy AS species ON species.id = species_id
				INNER JOIN db189691_massbase.project P ON P.id = project_id
				INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id 
				WHERE bin_id = ' . $searchTerm . ' ' .
				$limit;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving bin specimens. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($s as $row)
	{
		$results[] = array('id' => $row['id'], 'bin_id_bold' => $row['bin_id_bold'], 'process_id' => $row['process_id'], 
							'phylum' => $row['phylum'], 'class' => $row['class'], 'order' => $row['ord'], 
							'family' => $row['family'], 'genus' => $row['genus'], 'species' => $row['species'], 
							'weight' => $row['weight'], 'project' => $row['project']);
	}

	try
	{
		$sql = 'SELECT count(bin_id_bold) as count 
				FROM db189691_massbase.specimen S 
				INNER JOIN db189691_massbase.bin B ON B.id = bin_id 
				INNER JOIN db189691_massbase.taxonomy AS phylum ON phylum.id = phylum_id 
				INNER JOIN db189691_massbase.taxonomy AS class ON class.id = class_id 
				INNER JOIN db189691_massbase.taxonomy AS order_name ON order_name.id = order_id 
				INNER JOIN db189691_massbase.taxonomy AS family ON family.id = family_id 
				INNER JOIN db189691_massbase.taxonomy AS genus ON genus.id = genus_id 
				INNER JOIN db189691_massbase.taxonomy AS species ON species.id = species_id 
				INNER JOIN db189691_massbase.project P ON P.id = project_id 
				INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id WHERE bin_id = ' .
				$searchTerm;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving ' . $_GET['searchby'] . ' statistics. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($s as $row)
	{
		$count = $row['count'];
	}

	$_GET['searchterm'] = $results[0]['bin_id_bold'];

	include 'outputResults.php';
}
else
{
	try
	{
		$result = $pdo->query('SELECT count(DISTINCT id) as count FROM db189691_massbase.bin');
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving bin statistics. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($result as $row)
	{
		$count = $row['count'];
	}

	try
	{	$sql = 'SELECT B.id, bin_id, bin_id_bold, count(S.id) as NUM, sum(weight_minus_pin) as weight, 
				sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN 
				FROM db189691_massbase.specimen S, db189691_massbase.bin B, db189691_massbase.specimen_mass Sp
				WHERE B.id = S.bin_id AND 
				(bin_id_bold <> "" OR bin_id_bold <> "NO BIN" OR bin_id <> "" OR bin_id IS NOT NULL)
				AND S.id = specimen_id
				GROUP BY bin_id_bold ' .
				$sortby . ' ' . $limit . '';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving bin records. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($s as $row)
	{
		$results[] = array('id' => $row['id'], 'bin_id' => $row['bin_id'], 'bin_id_bold' => $row['bin_id_bold'], 
							'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
	}

	$title = "BIN";
	$plural = "BINS";

	include "table-browseresults.php";
}
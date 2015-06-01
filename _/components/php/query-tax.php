<?php

include 'db.inc.php';

if(isset($_GET['searchterm']))
{
	// hack to deal with browsing switch between searchterm strings and tax id numbers
	if(is_numeric($_GET['searchterm']) === FALSE)
	{
		try
		{
			$sql = 'SELECT id FROM db189691_massbase.taxonomy WHERE
					in_massbase = 1 AND category_id = '. $rankId .
					' AND name = "' . $_GET['searchterm'] . '"';
			$s = $pdo->prepare($sql);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error = 'Error retrieving ' . $_GET['searchterm'] . ' id.<br>' . $e->getMessage();
		  	include 'error.html.php';
		  	exit();
		}

		foreach($s as $row)
		{
			$searchTerm = $row['id'];
		}
	}

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
				WHERE ' . $column . " = " . $searchTerm .'
				ORDER BY bin_id_bold ' .
				$limit;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving ' . $_GET['searchby'] . ' records. ' . $e->getMessage();
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
		$sql = 'SELECT count(DISTINCT S.id) as count FROM db189691_massbase.specimen S
				INNER JOIN db189691_massbase.bin B ON B.id = bin_id
				INNER JOIN db189691_massbase.taxonomy AS phylum ON phylum.id = phylum_id
				INNER JOIN db189691_massbase.taxonomy AS class ON class.id = class_id
				INNER JOIN db189691_massbase.taxonomy AS order_name ON order_name.id = order_id
				INNER JOIN db189691_massbase.taxonomy AS family ON family.id = family_id
				INNER JOIN db189691_massbase.taxonomy AS genus ON genus.id = genus_id
				INNER JOIN db189691_massbase.taxonomy AS species ON species.id = species_id
				INNER JOIN db189691_massbase.project P ON P.id = project_id
				INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id 
				WHERE ' . $column . " = " . $searchTerm;
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

	$_GET['searchterm'] = $results[0][strtolower($title)];	

	include 'outputResults.php';
}
else
{
	try
	{
		$sql = 'SELECT count(DISTINCT ' . $column . ') as count FROM db189691_massbase.specimen';
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

	try
	{
		$sql = 'SELECT ' . $column . ', name, count(S.id) as NUM, sum(weight_minus_pin)/count(S.id) as AVG,
				max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
				FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T,  db189691_massbase.specimen_mass SM
				WHERE ' . $column . ' IS NOT NULL AND ' . $column . ' <> 0 AND ' . $column . ' = T.id 
				AND specimen_id = S.id
				GROUP BY ' . $column . ' ' .
				$sortby . ' ' . $limit;
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
		$results[] = array('id' => $row[$column], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['AVG'],
							'min' => $row['MIN'], 'max' => $row['MAX']);
	}

	include "table-browseresults.php";
}
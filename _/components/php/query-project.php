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
				WHERE project_id = ' . $searchTerm .
				' LIMIT 50';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving project records. ' . $e->getMessage();
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

	$_GET['searchterm'] = $results[0]['project'];

	try
	{
		$sql = 'SELECT count(S.id) as count
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
				WHERE project_id = ' . $searchTerm;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving project records. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($s as $row)
	{
		$count = $row['count'];
	}

	include 'outputResults.php';
}
else
{
	try
	{
		$result = $pdo->query('SELECT count(DISTINCT id) as count FROM db189691_massbase.project');
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
	{
		$sql = 'SELECT project_id, project_code, name, count(S.id) as NUM, 
				sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX,
				min(weight_minus_pin) AS MIN
				FROM db189691_massbase.specimen S, db189691_massbase.project P, 
				db189691_massbase.specimen_mass WHERE S.id = specimen_id
				AND P.id = S.project_id AND 
				(project_id <> "" OR project_id IS NOT NULL) 
				GROUP BY project_code ' .
				$sortby . ' ' . $limit;
		$s = $pdo->prepare($sql);
 		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error retrieving project records. ' . $e->getMessage();
	  	include 'error.html.php';
	  	exit();
	}

	foreach($s as $row)
	{
		$results[] = array('id' => $row['project_id'], 'project_code' => $row['project_code'], 
							'name' => $row['name'], 'NUM' => $row['NUM'],
							'avg' => $row['avg'], 'max' => $row['MAX'], 'min' => $row['MIN']);
	}

	$title = "Project";
	$plural = "Projects";

	include "table-browseresults.php";
}
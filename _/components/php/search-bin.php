<?php

include 'db.inc.php';

$termCat = "";

if($searchTerms[0] <> "")
{
	for($i = 0; $i < count($searchTerms); $i++)
	{
		$searchTerms[$i] = 'bin_id = (SELECT id FROM db189691_massbase.bin WHERE lower(bin_id_bold)  
							= lower("' . $searchTerms[$i] . '"))';
		$termCat .= $searchTerms[$i];

		if(count($searchTerms) > 1 AND $i < count($searchTerms) - 1)
		{
			$termCat .= " OR ";
		}
	}

	if(strcmp($termCat,"") <> 0)
	{
		$termCat = "(" . $termCat . ")";
	}
}
else // Deal with empty string in search textbox
{
	$termCat = "(1)";
}

if(strcmp($weightClause,"") <> 0)
{
	$termCat .= " AND " . $weightClause;
}

// Retrieve all bin ids and taxonomic ranks matching search string 
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
			WHERE ' . $termCat . ' ' . $sortby . ' ' .$limit;
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = "Error retrieving bin results. <br>" . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
	$results[] = array('id' => $row['id'], 'bin_id_bold' => $row['bin_id_bold'], 
						'process_id' => $row['process_id'], 'phylum' => $row['phylum'], 
						'class' => $row['class'], 'order' => $row['ord'], 'family' => $row['family'], 
						'genus' => $row['genus'], 'species' => $row['species'], 'weight' => $row['weight'], 
						'project' => $row['project']);
}

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
			WHERE ' . $termCat;
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = "Error retrieving BIN search count for query<br>" . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
	$count = $row['count'];
}
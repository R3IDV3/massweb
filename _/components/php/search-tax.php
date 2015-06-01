<?php

include 'db.inc.php';

if($searchTerms[0] <> "")
{
	for($i = 0; $i < count($searchTerms); $i++)
	{
		$searchTerms[$i] = ' name = lower("' . $searchTerms[$i] . '") ';
		$termCat .= $searchTerms[$i];

		if(count($searchTerms) > 1 AND $i < count($searchTerms) - 1)
		{
			$termCat .= " OR ";
		}
	}
}
else //Deal with empty string for full search
{
	$termCat = "1";
}

// Retrieve all ids and taxonomic ranks matching search string 
try
{
	$sql = 'SELECT id, category_id, name FROM db189691_massbase.taxonomy 
			WHERE in_massbase = 1 AND ' . $termCat;
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = "Error retrieving taxonomic results for query. <br>" . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array('id' => $row['id'], 'category_id' => $row['category_id'], 'name' => $row['name']);
}

$id = "";

for($i = 0; $i < count($taxonomy); $i++)
{
	$id .= $taxonomy[$i]['name'];

	if($i < count($taxonomy) - 1)
	{
		$id .= ",";
	}
}

if(count($taxonomy) > 0)
{
	$searchTax = 'SELECT S.id, process_id, bin_id_bold, phylum.name as phylum, class.name as class, order_name.name as ord, 
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
					AND (';

	$taxSelect = "";

	for($i = 0; $i < count($taxonomy); $i++)
	{
		switch($taxonomy[$i]['category_id'])
		{
			case 1: // Phylum
				$taxSelect .= " phylum_id = " . $taxonomy[$i]['id'];
				$searchBy = "phylum";
				break;
			case 2: // Class
				$taxSelect .= " class_id = " . $taxonomy[$i]['id'];
				$searchBy = "class";
				break;
			case 3: // Order
				$taxSelect .= " order_id = " . $taxonomy[$i]['id'];
				$searchBy = "order";
				break;
			case 4: // Family
				$taxSelect .= " family_id = " . $taxonomy[$i]['id'];
				$searchBy = "family";
				break;
			case 5: // Subfamily
				$taxSelect .= " subfamily_id = " . $taxonomy[$i]['id'];
				$searchBy = "subfamily";
				break;
			case 7: // Genus
				$taxSelect .= " genus_id = " . $taxonomy[$i]['id'];
				$searchBy = "genus";
				break;
			case 8: // Species
				$taxSelect .= " species_id = " . $taxonomy[$i]['id'];
				$searchBy = "species";
				break;
			default: // Ignore any taxonomic ranks that won't be represented on massbase
				$taxSelect = "";
				break;

		}

		if($i < (count($taxonomy) - 1))
		{
			$taxSelect .= " OR ";
		}
		else
		{
			$taxSelect .= ")";
		}
	}

	if(strcmp($termCat,"1") == 0)
	{
		$taxSelect = "1)";
	}

	$searchTax .= $taxSelect;

	$countStatement = "SELECT count(S.id) as count FROM db189691_massbase.specimen S
						INNER JOIN db189691_massbase.bin B ON B.id = bin_id
						INNER JOIN db189691_massbase.taxonomy AS phylum ON phylum.id = phylum_id
						INNER JOIN db189691_massbase.taxonomy AS class ON class.id = class_id
						INNER JOIN db189691_massbase.taxonomy AS order_name ON order_name.id = order_id
						INNER JOIN db189691_massbase.taxonomy AS family ON family.id = family_id
						INNER JOIN db189691_massbase.taxonomy AS genus ON genus.id = genus_id
						INNER JOIN db189691_massbase.taxonomy AS species ON species.id = species_id
						INNER JOIN db189691_massbase.project P ON P.id = project_id
						INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id 
						AND (" . $taxSelect;

	if(strcmp($weightClause,"") <> 0)
	{
		$searchTax .= " AND " . $weightClause;
	}

	$searchTax .= " " . $sortby . " " . $limit;

	//add arguments to count query, ignoring limit
	if(strcmp($weightClause,"") <> 0)
	{
		$countStatement .= " AND " . $weightClause;
	}

	try
	{
		$sql = $searchTax;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = "Error retrieving search results." . $e->getMessage();
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
		$sql = $countStatement;
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = "Error retrieving count. <br>" . $e->getMessage();
		include 'error.html.php';
		exit();
	}

	foreach($s as $row)
	{
		$count = $row['count'];
	}
}
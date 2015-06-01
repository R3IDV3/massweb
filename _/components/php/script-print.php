<?php

include 'db.inc.php';
include 'helper-cleanse.php';

header('Content-Type: application/csv'); 
header('Content-Disposition: attachment; filename=massbase.csv');

$searchTerm = cleanse($_GET['id']);

$header = array("Process ID","BIN","Phylum","Class","Order","Family","Genus","Species",
				"Specimen Condition Notes","Voucher Condition","Mass","Reference",
				"Balance","Date Weighed(Y-M-D)","Standard Deviation","BOLD Link");

$termCat = "";
$start = "";
$finish = "";

$searchTerms = explode(",", $searchTerm);

if(strcmp($_GET['searchby'],"specimen") == 0)
{
	$field = 'process_id = "';
	$finish = '"';
}
elseif(strcmp($_GET['searchby'],"phylum") == 0)
{
	$field = "phylum_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 1 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"class") == 0)
{
	$field = "class_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 2 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"order") == 0)
{
	$field = "order_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 3 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"family") == 0)
{
	$field = "family_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 4 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"genus") == 0)
{
	$field = "genus_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 7 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"species") == 0)
{
	$field = "species_id = ";
	$start = '(SELECT id FROM db189691_massbase.taxonomy WHERE category_id = 8 AND in_massbase = 1 AND name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"bin") == 0)
{
	$field = "bin_id = ";
	$start = '(SELECT id FROM db189691_massbase.bin WHERE bin_id_bold = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"project") == 0)
{
	$field = "project_id = ";
	$start = '(SELECT id FROM db189691_massbase.project WHERE project_code = "';
	$second = '(SELECT id FROM db189691_massbase.project WHERE name = "';
	$finish = '")';
}
elseif(strcmp($_GET['searchby'],"all") == 0)
{
	$field = "1";
}
elseif(strcmp($_GET['searchby'],"heaviest") == 0)
{
	exit();
}
elseif(strcmp($_GET['searchby'],"lightest") == 0)
{
	exit();
}
else
{
	exit();
}

for($i = 0; $i < count($searchTerms); $i++)
{
	$searchTerms[$i] = $field . $start . $searchTerms[$i] . $finish;
	$termCat .= $searchTerms[$i];

	if(count($searchTerms) > 1 AND $i < count($searchTerms) - 1)
	{
		$termCat .= " OR ";
	}
}

if(strcmp($termCat,"") <> 0)
{
	$termCat = ' AND (' . $termCat . ')';
}

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
			WHERE scale_id = Sc.id AND D.id = drying_id ' . $termCat;
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = "Error retrieving info for: " . $searchTerm . "<br>" . $e->getMessage();
	include 'error.html.php';
	exit();
}

foreach($s as $row)
{
	$specimen[] = array('id' => $row['id'], 'bin_id_bold' => $row['bin_id_bold'], 'process_id' => $row['process_id'], 
						'phylum' => $row['phylum'], 'class' => $row['class'], 'order' => $row['ord'], 
						'family' => $row['family'], 'subfamily' => $row['subfamily'], 'genus' => $row['genus'], 'species' => $row['species'], 
						'weight' => $row['weight'], 'project' => $row['project'], 'project_id' => $row['project_id'],
						'weigh_date' => $row['weigh_date'], 'scale' => $row['model'], 'specimen_notes' => $row['specimen_notes'],
						'drying' => $row['drying'], 'standard_deviation' => $row['standard_deviation']);
}

for($i = 0; $i < count($specimen); $i++)
{
	$toPrint[] = array($specimen[$i]['process_id'],$specimen[$i]['bin_id_bold'],$specimen[$i]['phylum'],
					$specimen[$i]['class'],$specimen[$i]['order'],$specimen[$i]['family'],$specimen[$i]['genus'],
					$specimen[$i]['species'],$specimen[$i]['specimen_notes'],
					$specimen[$i]['drying'],$specimen[$i]['weight'],$specimen[$i]['project'],$specimen[$i]['scale'],
					$specimen[$i]['weigh_date'],$specimen[$i]['standard_deviation'],
					"http://www.boldsystems.org/index.php/Public_RecordView?processid=" . $specimen[$i]['process_id']);
}

$f = fopen('php://output', 'a');

fputcsv($f, $header);

for($i = 0; $i < count($toPrint); $i++)
{
	fputcsv($f, $toPrint[$i]);
}

fclose($f);
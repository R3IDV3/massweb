<?php

include 'db.inc.php';

/********************************************
*	Tabbed taxonomy list queries
********************************************/

// Class
try
{
	$result = $pdo->query('SELECT class_id, name, count(S.id) NUM, sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T, db189691_massbase.specimen_mass
							WHERE class_id IS NOT NULL AND class_id <> 0 AND class_id = T.id AND S.id = specimen_id
							GROUP BY class_id
							ORDER BY NUM DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving class statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$class[] = array('class_id' => $row['class_id'], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// Order
try
{
	$result = $pdo->query('SELECT order_id, name, count(S.id) NUM, sum(weight_minus_pin)/count(S.id) AS avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T, db189691_massbase.specimen_mass 
							WHERE order_id IS NOT NULL AND order_id <> 0 AND order_id = T.id AND S.id = specimen_id
							GROUP BY order_id
							ORDER BY NUM DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving order statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$order[] = array('order_id' => $row['order_id'], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// Family
try
{
	$result = $pdo->query('SELECT family_id, name, count(S.id) NUM, sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) as MIN
							FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T, db189691_massbase.specimen_mass 
							WHERE family_id IS NOT NULL AND family_id <> 0 AND family_id = T.id AND S.id = specimen_id
							GROUP BY family_id
							ORDER BY NUM DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving family statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$family[] = array('family_id' => $row['family_id'], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// Genus
try
{
	$result = $pdo->query('SELECT genus_id, name, count(S.id) NUM, sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T, db189691_massbase.specimen_mass 
							WHERE genus_id IS NOT NULL AND genus_id <> 0 AND genus_id = T.id AND S.id = specimen_id
							GROUP BY genus_id
							ORDER BY NUM DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving genus statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$genus[] = array('genus_id' => $row['genus_id'], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// Species
try
{
	$result = $pdo->query('SELECT species_id, name, count(S.id) NUM, sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.taxonomy T, db189691_massbase.specimen_mass 
							WHERE species_id IS NOT NULL AND species_id <> 0 AND species_id = T.id AND S.id = specimen_id
							GROUP BY species_id
							ORDER BY NUM DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving species statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$species[] = array('species_id' => $row['species_id'], 'name' => $row['name'], 'NUM' => $row['NUM'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// BIN
try
{
	$result = $pdo->query('SELECT bin_id, bin_id_bold, count(S.id), sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.bin B, db189691_massbase.specimen_mass 
							WHERE B.id = S.bin_id AND 
							(bin_id_bold <> "" OR bin_id_bold <> "NO BIN" OR bin_id <> "" OR bin_id IS NOT NULL) AND S.id = specimen_id
							GROUP BY bin_id_bold ORDER BY `count(S.id)` DESC LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving bin statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$bin[] = array('bin_id' => $row['bin_id'], 'bin_id_bold' => $row['bin_id_bold'], 'NUM' => $row['count(S.id)'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

// Project
try
{
	$result = $pdo->query('SELECT project_id, project_code, name, count(S.id), sum(weight_minus_pin)/count(S.id) as avg, max(weight_minus_pin) AS MAX, min(weight_minus_pin) AS MIN
							FROM db189691_massbase.specimen S, db189691_massbase.project P, db189691_massbase.specimen_mass 
							WHERE P.id = S.project_id AND 
							(project_id <> "" OR project_id IS NOT NULL) AND S.id = specimen_id AND S.id = specimen_id
							GROUP BY project_code ORDER BY `count(S.id)` DESC LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving project statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$project[] = array('project_id' => $row['project_id'], 'project_code' => $row['project_code'], 'name' => $row['name'], 'NUM' => $row['count(S.id)'], 'avg' => $row['avg'], 'min' => $row['MIN'], 'max' => $row['MAX']);
}

//Lightest
try
{
 	$result = $pdo->query('SELECT S.id, name, process_id, weight_minus_pin
							FROM db189691_massbase.specimen S, db189691_massbase.specimen_mass, db189691_massbase.taxonomy T 
							WHERE species_id = T.id AND specimen_id = S.id 
							ORDER BY weight_minus_pin ASC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving lightest statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$lightest[] = array('id' => $row['id'], 'name' => $row['name'], 
						'weight_minus_pin' => $row['weight_minus_pin'],
						'process_id' => $row['process_id']);
}

if(count($lightest) < 5)
{	
	for($i = count($lightest); $i < 5; $i++)
	{
		$lightest[$i] = array('name' => NULL, 'weight' => NULL);
	}
}

//Heaviest
try
{
 	$result = $pdo->query('SELECT S.id, name, process_id, weight_minus_pin
							FROM db189691_massbase.specimen S, db189691_massbase.specimen_mass, db189691_massbase.taxonomy T 
							WHERE species_id = T.id AND specimen_id = S.id 
							ORDER BY weight_minus_pin DESC
							LIMIT 5');
}
catch(PDOException $e)
{
	$error = 'Error retrieving lightest statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$heaviest[] = array('id' => $row['id'], 'name' => $row['name'], 
						'weight_minus_pin' => $row['weight_minus_pin'],
						'process_id' => $row['process_id']);
}

if(count($heaviest) < 5)
{	
	for($i = count($heaviest); $i < 5; $i++)
	{
		$heaviest[$i] = array('name' => NULL, 'weight' => NULL);
	}
}


/********************************************
*	Retrieve statistical counts about database
********************************************/
try
{
	$sql = 'SELECT count(DISTINCT class_id) as classTotal,
			count(DISTINCT order_id) as orderTotal,
			count(DISTINCT family_id) as familyTotal,
			count(DISTINCT genus_id) as genusTotal,
			count(DISTINCT species_id) as speciesTotal,
			count(DISTINCT bin_id) as binTotal
			FROM db189691_massbase.specimen';
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
 	$massInfo = array('classTOTAL' => $row['classTOTAL'], 'classTOTAL' => $row['classTOTAL'], 'classTOTAL' => $row['classTOTAL'],
 						'classTOTAL' => $row['classTOTAL'], 'classTOTAL' => $row['classTOTAL'], 'classTOTAL' => $row['classTOTAL'],
 						'classTOTAL' => $row['classTOTAL'],);
}
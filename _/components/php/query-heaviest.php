<?php

include 'db.inc.php';

try
{
	$result = $pdo->query('SELECT count(S.id) as count FROM db189691_massbase.specimen S
							INNER JOIN db189691_massbase.specimen_mass ON S.id = specimen_id');
}
catch(PDOException $e)
{
	$error = 'Error retrieving heaviest statistics. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($result as $row)
{
	$count = $row['count'];
}

try
{	
	$sql = 'SELECT name, process_id, weight_minus_pin as weight 
			FROM db189691_massbase.specimen S, db189691_massbase.specimen_mass, db189691_massbase.taxonomy T 
			WHERE species_id = T.id AND specimen_id = S.id ' .
			$sortby . ' ' . $limit;
 	$s = $pdo->prepare($sql);
 	$s->execute();
}
catch(PDOException $e)
{
	$error = 'Error retrieving heaviest records. ' . $e->getMessage();
  	include 'error.html.php';
  	exit();
}

foreach($s as $row)
{
	$results[] = array('id' => $row['id'], 'name' => $row['name'], 'weight' => $row['weight'], 'process_id' => $row['process_id']);
}
?>

<?php

include 'db.inc.php';

try
{
 	$sql = 'SELECT count(*) as TOTAL 
  			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = 'Error retrieving mass base specimen statistics. ' . $e->getMessage();
	include 'includes/error.html.php';
	exit();
}

foreach($s as $row)
{
 	$massTotal = $row['TOTAL'];
}

try
{
 	$sql = 'SELECT ROUND(sum(weight_minus_pin),3) as TOTAL_WEIGHT 
  			FROM db189691_massbase.specimen_mass
			WHERE weight_minus_pin >= 0';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	$error = 'Error retrieving mass base mass statistics. ' . $e->getMessage();
	include 'includes/error.html.php';
	exit();
}

foreach($s as $row)
{
 	$massMass = $row['TOTAL_WEIGHT'];
}
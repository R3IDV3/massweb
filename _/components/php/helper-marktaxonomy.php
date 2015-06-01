<?php

include 'db.inc.php';

$k = 0; 


try
{
	$sql = 'SELECT DISTINCT phylum_id as id
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT class_id as id
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT order_id as id 
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT family_id as id 
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT subfamily_id as id 
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT genus_id as id 
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

try
{
	$sql = 'SELECT DISTINCT species_id as id
			FROM db189691_massbase.specimen';
	$s = $pdo->prepare($sql);
	$s->execute();
}
catch(PDOException $e)
{
	echo  "Error retrieving results for query: <br>" . $sql . "<br>" . $e->getMessage();
	
	exit();
}

foreach($s as $row)
{
	$taxonomy[] = array(0 => $row['id']);
}

echo count($taxonomy);

	

$number = array_unique($taxonomy);
$number = array_filter($taxonomy);
sort($number);

var_dump($number);

for($i = 0; $i < count($number); $i++)
{
	try
	{
		$sql = 'UPDATE db189691_massbase.taxonomy SET in_massbase = 1 WHERE id = ' . $number[$i][0];
		echo $sql . ";<br>";
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e)
	{
		echo "Error updating taxonomy in query: <br>" . $sql . "<br>" . $e->getMessage();
		exit();
	}
}

echo "finished marking " . count($number) . " distinct taxons.";



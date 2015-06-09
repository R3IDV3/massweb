<?php

include 'db.inc.php';

try{
	// prepare sql and bind parameters
	$stmt = $pdo->prepare("INSERT INTO specimen_copy SET process_id = \":processID\", sample_id = \":sampleID\", bin_id = (SELECT id FROM bin WHERE bin_id_bold = \":BIN\"), project_id = (SELECT id FROM project WHERE project_code = \":project\"), specimen_notes = \":specimenNotes\", drying_id = (SELECT id FROM drying_method WHERE lower(type) = lower(\":dryingMethod\"))");
	$stmt->bindParam(':processID',$processID);
	$stmt->bindParam(':sampleID',$sampleID);
	$stmt->bindParam(':BIN',$BIN);
	$stmt->bindParam(':project',$project);
	$stmt->bindParam(':specimenNotes',$specimenNotes);
	$stmt->bindParam(':dryingMethod',$dryingMethod);
	
	// for each line in the csv, assign variables and insert a row
	
	
}

?>
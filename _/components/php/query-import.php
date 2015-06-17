<?php

include 'db.inc.php';

try{
	
	if (empty($_FILES['newProjectFile']['name']) === FALSE && isset($_POST['newProject'])) {
		// prepare statement
		$stmtProject = $pdo->prepare("INSERT INTO db189691_massbase.project_copy SET project_code = :project");
		// bind parameters
		$stmtProject->bindParam(':project',$project);
		
		echo "Successfully bound new project parameters.<br>";
		
		// for all lines but the header
		for ($i = 1; $i < count($projectTable); ++$i) {
			// assign variables
			$project = $projectTable[$i][0];
			// execute statement
			$stmtProject->execute();
		}
	}
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage() . "<br>";
	$pdo = NULL;
	echo "Upload Stopped.<br>";
	echo "Closed connection.<br>";
	exit();
}

try {
		
	if (empty($_FILES['newPinFile']['name']) === FALSE  && isset($_POST['newPin'])) {
		$stmtPin = $pdo->prepare("INSERT INTO db189691_massbase.pin_copy SET code = :pinCode, weight = :avgPinWeight, size = :pinSize, standard_deviation = :pinWeightSTD, colour = :pinColour, head = :pinHead, description = :comment");
		$stmtPin->bindParam(':pinCode',$pinCode);
		$stmtPin->bindParam(':avgPinWeight',$avgPinWeight);
		$stmtPin->bindParam(':pinSize',$pinSize);
		$stmtPin->bindParam(':pinWeightSTD',$pinWeightSTD);
		$stmtPin->bindParam(':pinColour',$pinColour);
		$stmtPin->bindParam(':pinHead',$pinHead);
		$stmtPin->bindParam(':comment',$comment)
		
		echo "Successfully bound new pin parameters.<br>";
		
		for ($i = 1; $i < count($pinTable); ++$i) {
			$pinCode = $pinTable[$i][0];
			$pinColour = $pinTable[$i][1];
			$pinHead = $pinTable[$i][2];
			$pinSize = $pinTable[$i][3];
			$avgPinWeight = $pinTable[$i][4];
			$pinWeightSTD = $pinTable[$i][5];
			$comment = $pinTable[$i][6];
			
			$stmtPin->execute();
		}
	}
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage() . "<br>";
	$pdo = NULL;
	echo "Upload Stopped.<br>";
	echo "Closed connection.<br>";
	exit();
}

try {
	
	if (empty($_FILES['newBINFile']['name']) === FALSE  && isset($_POST['newBIN'])) {
		$stmtBIN = $pdo->prepare("INSERT INTO db189691_massbase.bin_copy SET bin_id_bold = :BIN");
		$stmtBIN->bindParam(':BIN',$BIN);
		
		echo "Successfully bound new BIN parameters.<br>";
		
		for ($i = 1; $i < count($BINTable); ++$i) {
			$BIN = $BINTable[$i][0];
			
			$stmtBIN->execute();
		}
	}
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage() . "<br>";
	$pdo = NULL;
	echo "Upload Stopped.<br>";
	echo "Closed connection.<br>";
	exit();
}
	
try {
	
	// prepare sql and bind parameters for specimen table
	$stmtSpecimen = $pdo->prepare("INSERT INTO db189691_massbase.specimen_copy SET process_id = :processID, sample_id = :sampleID, bin_id = (SELECT id FROM db189691_massbase.bin WHERE bin_id_bold = :BIN), project_id = (SELECT id FROM db189691_massbase.project WHERE project_code = :project), specimen_notes = :specimenNotes, drying_id = (SELECT id FROM db189691_massbase.drying_method WHERE lower(type) = lower(:dryingMethod))");
	$stmtSpecimen->bindParam(':processID',$processID);
	$stmtSpecimen->bindParam(':sampleID',$sampleID);
	$stmtSpecimen->bindParam(':BIN',$BIN);
	$stmtSpecimen->bindParam(':project',$project);
	$stmtSpecimen->bindParam(':specimenNotes',$specimenNotes);
	$stmtSpecimen->bindParam(':dryingMethod',$dryingMethod);
	
	echo "Successfully bound specimen parameters.<br>";
	
	// prepare sql and bind parameters for specimen_mass table
	$stmtSpecimenMass = $pdo->prepare("INSERT INTO db189691_massbase.specimen_mass_copy SET specimen_id = (SELECT id FROM db189691_massbase.specimen_copy WHERE process_id = :processID), weigh_date = :dateWeighed, scale_id = (SELECT id FROM db189691_massbase.scale WHERE model = :machineWeighedOn), weight_with_pin = :weightWithPin, pin_id = (SELECT id FROM db189691_massbase.pin WHERE code= :pinCode )");
	$stmtSpecimenMass->bindParam(':processID',$processID);
	$stmtSpecimenMass->bindParam(':dateWeighed',$dateWeighed);
	$stmtSpecimenMass->bindParam(':machineWeighedOn',$machineWeighedOn);
	$stmtSpecimenMass->bindParam(':weightWithPin',$weightWithPin);
	$stmtSpecimenMass->bindParam(':pinCode',$pinCode);
	
	echo "Successfully bound specimen_mass parameters.<br>";
	
	// for each line in the csv, assign variables and insert data
	for ($i = 1; $i < count($specimenTable); ++$i) {
		$processID = 		$specimenTable[$i][0];
		$sampleID = 		$specimenTable[$i][1];
		$BIN = 				$specimenTable[$i][2];
		$project =			$specimenTable[$i][3];
		$specimenNotes =	$specimenTable[$i][4];
		$dryingMethod = 	$specimenTable[$i][5];
		$dateWeighed =		$specimenTable[$i][6];
		$machineWeighedOn = $specimenTable[$i][7];
		$weightWithPin =	$specimenTable[$i][8];
		$pinCode = 			$specimenTable[$i][9];
		
		$stmtSpecimen->execute();
		$stmtSpecimenMass->execute();
	}
	
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage() . "<br>";
	$pdo = NULL;
	echo "Upload Stopped.<br>";
	echo "Closed connection.<br>";
	exit();
}

$pdo = NULL;
echo "Upload successful.<br>";
echo "Closed connection.<br>";

?>
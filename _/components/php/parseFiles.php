<?php

$uploadOk = 1;

if (empty($_FILES['specimenFile']['name']) === TRUE) {
	$uploadOk = 0;
	echo "Data not uploaded, specimen data file was not selected. <br>";
	exit();
}

if ($uploadOk == 1) {
	
	$specimenTable = parseFile($_FILES["specimenFile"]);
	if (gettype($specimenTable) == "string") { // if there was an error parsing
			echo $specimenTable;
			exit();
	} else { // no error parsing
		
		if ( $specimenTable[0] !== array("ProcessID", "SampleID", "BIN", "Project", "SpecimenNotes", "DryingMethod", "DateWeighed", "MachineWeighedOn", "WeightWithPin", "PinCode") ) {
			echo "Unsuccessful validation of specimen data.";
			exit();
			
		}
	}
	
	if (empty($_FILES['newProjectFile']['name']) === FALSE && isset($_POST['newProject'])) {	
		// A project file was selected for upload
		$projectTable = parseFile($_FILES["newProjectFile"]);
		if (gettype($projectTable) == "string") { // if there was an error parsing
			echo $projectTable . " Upload stopped.";
			exit();
		} else { // no error parsing
		
			if ( $projectTable[0] !== array("Project") ) {
				echo "Unsuccessful validation of new project file.";
				exit();	
			}
			
		}
	} else {
		$projectTable = NULL;
	}
	
	if (empty($_FILES['newPinFile']['name']) === FALSE  && isset($_POST['newPin'])) {	
		// A pin file was selected for upload
		$pinTable = parseFile($_FILES["newPinFile"]);
		if (gettype($pinTable) == "string") { // if there was an error parsing
			echo $pinTable . " Upload stopped.";
			exit();
		} else { // no error parsing
		
			if ( $pinTable[0] !== array("ID", "PinColour", "PinHead", "PinSize", "AVGPinWeight", "PinWeightSTD", "Comment") ) {
				echo "Unsuccessful validation of new pin file.";
				exit();	
			}
			
		}
	} else {
		$pinTable = NULL;
	}
	
	if (empty($_FILES['newBINFile']['name']) === FALSE  && isset($_POST['newBIN'])) {	
		// A BIN file was selected for upload
		$BINTable = parseFile($_FILES["newBINFile"]);
		if (gettype($BINTable) == "string") { // if there was an error parsing
			echo $BINTable . " Upload stopped.";
			exit();
		} else { // no error parsing
		
			if ( $BINTable[0] !== array("BIN") ) {
				echo "Unsuccessful validation of new BIN file.";
				exit();	
			}
			
		}
	} else {
		$BINTable = NULL;
	}
}

echo "Successfully validated and uploaded files.<br>";


function parseFile($selectedFile) {
	
	$target_dir = "temp/";
	$target_file = $target_dir . basename($selectedFile["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if file is a CSV file and named properly
	if(isset($_POST["submit"])) {
	    // Allow CSV only
		if($fileType != "csv" ) {
		    $error = "Error uploading, " . basename($selectedFile["name"]) . " is not a CSV file.<br>";
		    return $error;
		}
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 1) {
	    if (move_uploaded_file($selectedFile["tmp_name"], $target_file)) {
	        echo "The file ". basename($selectedFile["name"]). " has been uploaded.<br>";
	        
	        // initialize an array to hold each line in the
	        $table = array();
	        
	        // read the contents of the file into a 2D array
	        $file = fopen("temp/" . basename($selectedFile["name"]),"r");
	        while(! feof($file)) {
		        $line = fgetcsv($file);
		        if ($line !== NULL) {
			        $table[] = $line;
		        }
	        }
	        //print_r($table);
	        fclose($file);
	        
	        // delete the temporary file
	        if (!unlink("temp/" . basename($selectedFile["name"]))) {
				$error = "Error deleting " . basename($selectedFile["name"] . "<br>");
				return $error;
			} else {
				echo "Deleted " . basename($selectedFile["name"]) . "<br>";
			}
			
			return $table;
	        
	    } else {
	        $error = "Sorry, there was an error uploading " . basename($selectedFile["name"]) . ".<br>";
	        return $error;
	    }
	}

}
?>
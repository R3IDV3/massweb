<?php

$target_dir = "temp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file is a CSV file
if(isset($_POST["submit"])) {
    // Allow CSV only
	if($fileType != "csv" ) {
	    echo "Sorry, only CSV files are allowed. ";
	    $uploadOk = 0;
	} else {
		$uploadOk = 1;
	}
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. ";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";
        
        // initialize an array to hold each line in the
        $table = array();
        
        // read the contents of the file into a 2D array
        $file = fopen("temp/" . basename($_FILES["fileToUpload"]["name"]),"r");
        while(! feof($file)) {
	        $line = fgetcsv($file);
	        $table[] = $line;
        }
        print_r($table);
        fclose($file);
        
        // include 'query-import.php'
        
        // delete the temporary file
        if (!unlink("temp/" . basename($_FILES["fileToUpload"]["name"]))) {
			echo ("Error deleting " . basename($_FILES["fileToUpload"]["name"]));
		} else {
			echo ("Deleted " . basename($_FILES["fileToUpload"]["name"]));
		}
        
    } else {
        echo "Sorry, there was an error uploading your file. ";
    }
}
?>
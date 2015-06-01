<?php

function cleanse($text)
{
	$injectionTerms = array("insert", "update", "delete", "drop", "select", "union", 
							"database", ";", "\'", "--", "/*", "*/", "xp_", "*", "db189691");

	$cleanTerm = strip_tags($text); // remove HTML and PHP tags

	$cleanTerm = htmlspecialchars($cleanTerm, ENT_QUOTES, 'UTF-8');	// convert special characters to HTML entities

	foreach($injectionTerms as $i)
	{
		if(stripos($cleanTerm, $i) !== FALSE) // if the injection term is found in $cleanterm
		{
			$cleanTerm = str_ireplace($i, "", $cleanTerm); // remove all occurences of it in $cleanterm
		}
	}

	$cleanTerm = trim($cleanTerm); // remove whitespace from the beginning and end of $cleanterm

	return $cleanTerm;
}


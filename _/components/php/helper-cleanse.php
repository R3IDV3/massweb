<?php

function cleanse($text)
{
	$injectionTerms = array("insert", "update", "delete", "drop", "select", "union", 
							"database", ";", "\'", "--", "/*", "*/", "xp_", "*", "db189691");

	$cleanTerm = strip_tags($text);

	$cleanTerm = htmlspecialchars($cleanTerm, ENT_QUOTES, 'UTF-8');	

	foreach($injectionTerms as $i)
	{
		if(stripos($cleanTerm, $i) !== FALSE)
		{
			$cleanTerm = str_ireplace($i, "", $cleanTerm);
		}
	}

	$cleanTerm = trim($cleanTerm);

	return $cleanTerm;
}


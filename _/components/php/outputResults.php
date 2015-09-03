<?php

if(!isset($searchTerm)) {
	include 'helper-cleanse.php';
}

if($_GET['searchterm'] != "") {
	$searchTerm = cleanse($_GET['searchterm']); // cleanse() is found in helper_cleanse.php

	$searchArray = explode(",", $_GET['searchterm']); // multiple search terms can be separated by commas

	foreach($searchArray as $word) {
		$searchTerms[] = cleanse($word);
	}

	$searchTerms = array_filter($searchTerms);
} else {
	$searchTerms[0] = "";
}

if(isset($_GET['page']) && is_numeric($_GET['page'])) {
	$limit = "LIMIT " . (50 * ($_GET['page'] - 1)) . ", 50"; 
} else {
	$limit = "LIMIT 0, 50";
}

$sortby = "";

if(isset($_GET['sortby']))
{
	$sortby = cleanse($_GET['sortby']);

	if(strcmp($sortby,"bindesc") == 0)
	{
		$sortby = " ORDER BY bin_id_bold DESC";
	}
	elseif(strcmp($sortby,"binasc") == 0)
	{
		$sortby = " ORDER BY bin_id_bold ASC";
	}
	elseif(strcmp($sortby,"weightdesc") == 0)
	{
		$sortby = " ORDER BY weight_minus_pin DESC";
	}
	elseif(strcmp($sortby,"weightasc") == 0)
	{
		$sortby = " ORDER BY weight_minus_pin ASC";
	}
	elseif(strcmp($sortby,"speciesdesc") == 0 OR strcmp($sortby,"spedesc") == 0)
	{
		$sortby = " ORDER BY species DESC";
	}
	elseif(strcmp($sortby,"speciesasc") == 0 OR strcmp($sortby,"speasc") == 0)
	{
		$sortby = " ORDER BY species ASC";
	}
	elseif(strcmp($sortby,"projectdesc") == 0)
	{
		$sortby = " ORDER BY project DESC";
	}
	elseif(strcmp($sortby,"projectasc") == 0)
	{
		$sortby = " ORDER BY project ASC";
	}
	elseif(strcmp($sortby,"phyasc") == 0)
	{
		$sortby = " ORDER BY phylum ASC";
	}
	elseif(strcmp($sortby,"phydesc") == 0)
	{
		$sortby = " ORDER BY phylum DESC";
	}
	elseif(strcmp($sortby,"claasc") == 0)
	{
		$sortby = " ORDER BY class ASC";
	}
	elseif(strcmp($sortby,"cladesc") == 0)
	{
		$sortby = " ORDER BY class DESC";
	}
	elseif(strcmp($sortby,"ordasc") == 0)
	{
		$sortby = " ORDER BY ord ASC";
	}
	elseif(strcmp($sortby,"orddesc") == 0)
	{
		$sortby = " ORDER BY ord DESC";
	}
	elseif(strcmp($sortby,"famasc") == 0)
	{
		$sortby = " ORDER BY family ASC";
	}
	elseif(strcmp($sortby,"famdesc") == 0)
	{
		$sortby = " ORDER BY family DESC";
	}
	elseif(strcmp($sortby,"genasc") == 0)
	{
		$sortby = " ORDER BY genus ASC";
	}
	elseif(strcmp($sortby,"gendesc") == 0)
	{
		$sortby = " ORDER BY genus DESC";
	}
	elseif(strcmp($sortby,"pidasc") == 0)
	{
		$sortby = " ORDER BY process_id ASC";
	}
	elseif(strcmp($sortby,"piddesc") == 0)
	{
		$sortby = " ORDER BY process_id DESC";
	}
	elseif(strcmp($sortby,"massasc") == 0)
	{
		$sortby = " ORDER BY weight ASC";
	}
	elseif(strcmp($sortby,"massdesc") == 0)
	{
		$sortby = " ORDER BY weight DESC";
	}
}

$gtWeightClause = "";
$ltWeightClause = "";

if(isset($_GET['greaterthan']) && strcmp($_GET['greaterthan'], "") != 0) {
	$greaterThan = cleanse($_GET['greaterthan']);
	$gtWeightClause = " weight_minus_pin >= " . $greaterThan;
}

if(isset($_GET['lessthan']) && strcmp($_GET['lessthan'], "") != 0) {
	$lessThan = cleanse($_GET['lessthan']);
	$ltWeightClause = " weight_minus_pin <= " . $lessThan;
}

if(strcmp($ltWeightClause, "") != 0 AND strcmp($gtWeightClause, "") != 0) {
	$weightClause =  "(" . $ltWeightClause . " AND " . $gtWeightClause . ")";
} elseif(strcmp($ltWeightClause, "") == 0 AND strcmp($gtWeightClause, "") != 0) {
	$weightClause =  $gtWeightClause;
} elseif(strcmp($ltWeightClause, "") != 0 AND strcmp($gtWeightClause, "") == 0) {
	$weightClause =  $ltWeightClause;
}

if(count($searchTerms) > 0) {
	if(strcmp($_GET['searchby'], "taxonomy") == 0) {
		// offset duplicate queries caused by calling query-browse first
		$results = array();
		include "search-tax.php";
	} elseif(strcmp($_GET['searchby'], "binid") == 0) {	
		// offset duplicate queries caused by calling query-browse first
		$results = array();
		include "search-bin.php";
		$searchBy = "bin";
	} elseif(strcmp($_GET['searchby'], "project") == 0) {
		// offset duplicate queries caused by calling query-browse first
		$results = array(); 
		include "search-project.php";
		$searchBy = "project";
	} elseif(strcmp($_GET['searchby'], "processid") == 0) {
		include "search-processid.php";
	} else {
		if(strcmp($_GET['searchby'], "phylum") == 0) {
			$searchBy = "phylum";
			$rankId = 1;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "class") == 0) {
			$searchBy = "class";
			$rankId = 2;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "order") == 0) {
			$searchBy = "order";
			$rankId = 3;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "family") == 0) {
			$searchBy = "family";
			$rankId = 4;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "genus") == 0) {
			$searchBy = "genus";
			$rankId = 7;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "species") == 0) {
			$searchBy = "species";
			$rankId = 8;
			//hack to fix duplicate searches
			$results = array();
			include "search-tax.php";
		} elseif(strcmp($_GET['searchby'], "bin") == 0) {
			$searchBy = "bin";
		} elseif(strcmp($_GET['searchby'], "project") == 0) {
			$searchBy = "project";
		}
	}

	$id = $searchTerm;
}

include "table-searchResults.php";
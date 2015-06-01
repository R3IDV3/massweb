<?php

include 'helper-cleanse.php';

$searchTerm = cleanse($_GET['searchterm']);

$_GET['searchby'] = cleanse($_GET['searchby']);

$value = "name";

if(isset($_GET['page']) && is_numeric($_GET['page']))
{
	$limit = "LIMIT " . (50 * ($_GET['page'] - 1)) . ", 50";
}
else
{
	$limit = "LIMIT 0, 50";
}


if(isset($_GET['sortby']))
{
	$sortby = cleanse($_GET['sortby']);

	if(strcmp($sortby,"namedesc") == 0)
	{	
		if(strcmp($_GET['searchby'],"bin") == 0)
		{
			$sortby = " ORDER BY bin_id_bold DESC";
		}
		else
		{
			$sortby = " ORDER BY name DESC";
		}
	}
	elseif(strcmp($sortby,"nameasc") == 0)
	{
		if(strcmp($_GET['searchby'],"bin") == 0)
		{
			$sortby = " ORDER BY bin_id_bold ASC";
		}
		else
		{
			$sortby = " ORDER BY name ASC";
		}
	}
	elseif(strcmp($sortby,"nsdesc") == 0)
	{
		$sortby = " ORDER BY NUM DESC";
	}
	elseif(strcmp($sortby,"nsasc") == 0)
	{
		$sortby = " ORDER BY NUM ASC";
	}
	elseif(strcmp($sortby,"avgdesc") == 0)
	{
		$sortby = " ORDER BY AVG DESC";
	}
	elseif(strcmp($sortby,"avgasc") == 0)
	{
		$sortby = " ORDER BY AVG ASC";
	}
	elseif(strcmp($sortby,"mindesc") == 0)
	{
		$sortby = " ORDER BY MIN DESC";
	}
	elseif(strcmp($sortby, "minasc") == 0)
	{
		$sortby = " ORDER BY MIN ASC";
	}
	elseif(strcmp($sortby,"maxasc") == 0)
	{
		$sortby = " ORDER BY MAX ASC";
	}
	elseif(strcmp($sortby,"maxdesc") == 0)
	{
		$sortby = " ORDER BY MAX DESC";
	}
	elseif(strcmp($sortby,"speasc") == 0)
	{
		$sortby = " ORDER BY name ASC";
	}
	elseif(strcmp($sortby,"spedesc") == 0)
	{
		$sortby = " ORDER BY name DESC";
	}
	elseif(strcmp($sortby,"maxasc") == 0)
	{
		$sortby = " ORDER BY MAX ASC";
	}
	elseif(strcmp($sortby,"maxdesc") == 0)
	{
		$sortby = " ORDER BY MAX DESC";
	}
	elseif(strcmp($sortby,"massasc") == 0)
	{
		$sortby = " ORDER BY weight ASC";
	}
	elseif(strcmp($sortby,"massdesc") == 0)
	{
		$sortby = " ORDER BY weight DESC";
	}
	elseif(strcmp($sortby,"pidasc") == 0)
	{
		$sortby = " ORDER BY process_id ASC";
	}
	elseif(strcmp($sortby,"piddesc") == 0)
	{
		$sortby = " ORDER BY process_id DESC";
	}
	else
	{
		$sortby = "";
	}
}
else
{
	$sortby = " ORDER BY bin_id_bold ASC";
}

if(strcmp($_GET['searchby'], "class") == 0)
{
	$column = "class_id";
	$title = "Class";
	$plural = "Classes";
	$rankId = 2;
	include 'query-tax.php';
}
elseif(strcmp($_GET['searchby'], "order") == 0)
{
	$column = "order_id";
	$title = "Order";
	$plural = "Orders";
	$rankId = 3;
	include 'query-tax.php';
}
elseif(strcmp($_GET['searchby'], "family") == 0)
{
	$column = "family_id";
	$title = "Family";
	$plural = "Families";
	$rankId = 4;
	include 'query-tax.php';
}
elseif(strcmp($_GET['searchby'], "genus") == 0)
{
	$column = "genus_id";
	$title = "Genus";
	$plural = "Genera";
	$rankId = 7;
	include 'query-tax.php';
}
elseif(strcmp($_GET['searchby'], "species") == 0)
{
	$column = "species_id";
	$title = "Species";
	$plural = "Species";
	$rankId = 8;
	include 'query-tax.php';
}
elseif(strcmp($_GET['searchby'], "bin") == 0)
{
	$column = "bin_id";
	$title = "BIN";
	$plural = "BINs";
	$value = "bin_id_bold";
	include 'query-bin.php';
}
elseif(strcmp($_GET['searchby'], "project") == 0)
{
	$column = "project_id";
	$title = "Project";
	$plural = "Projects";
	$value = "project_code";
	include 'query-project.php';
}
elseif(strcmp($_GET['searchby'], "heaviest") == 0)
{
	$column = "";
	$title = "Heaviest";
	$plural = "Specimens";
	include 'query-heaviest.php';
	include "table-browseresults.php";
}
elseif(strcmp($_GET['searchby'], "lightest") == 0)
{
	$column = "";
	$title = "Lightest";
	$plural = "Specimens";
	include 'query-lightest.php';
	include "table-browseresults.php";
}
else
{
	echo "Invalid browsing category.";
}
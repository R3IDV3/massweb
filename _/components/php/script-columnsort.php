<?php

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
	elseif(strcmp($sortby,"speciesdesc") == 0)
	{
		$sortby = " ORDER BY species DESC";
	}
	elseif(strcmp($sortby,"speciesasc") == 0)
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
		$sortby = " ORDER BY order ASC";
	}
	elseif(strcmp($sortby,"orddesc") == 0)
	{
		$sortby = " ORDER BY order DESC";
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
	elseif(strcmp($sortby,"phydesc") == 0)
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
}
else
{
	$sortby = " ORDER BY bin_id_bold ASC";
}
echo $_GET['sortby'];
echo $sortby;
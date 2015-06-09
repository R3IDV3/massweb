<div class="col col-lg-12">
	<header class="clearfix">
		<section id="branding">
			<a href="index.php"><img class="responsive" src="<?php if (strpos(getcwd(), "restricted") !== FALSE) { echo "../"; } ?>images/misc/massbase_logo.png" width="250px" vspace="5" alt="Logo for MassBase"></a>
		</section><!-- branding -->
		<section class="navbar navbar-default"> 
			<ul class="nav navbar-nav">
				<?php 
					if (strpos(getcwd(), "restricted") === FALSE) { // if not in the restricted directory
						$navItems = <<<EOD
<li><a href="index.php">Home</a></li>
<li><a href="search.php">Search</a></li>
<li><a href="browse.php">Browse</a></li>
<li><a href="restricted/import.php">Import</a></li>
EOD;
					} else { // in the restricted directory
						$navItems = <<<EOD
<li><a href="../index.php">Home</a></li>
<li><a href="../search.php">Search</a></li>
<li><a href="../browse.php">Browse</a></li>
<li><a href="import.php">Import</a></li>
EOD;
					}
					echo "$navItems";
				?>
			</ul><!-- nav -->
		</section><!-- navbar -->
	</header>
</div><!-- column -->	

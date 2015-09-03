<section id="about">
	
	<?php include "_/components/php/query-indexStats.php"; ?>
	
	<?php 
		$quantityMilestone = ceil( $massTotal / 25000 ) * 25000;
		$prevQuantityMilestone = $quantityMilestone - 25000;
		$quantityPercent = ($massTotal - $prevQuantityMilestone) / 25000 * 100;
		
		$massMilestone = ceil( round($massMass/1000000, 4, PHP_ROUND_HALF_EVEN ) / 1 ) * 1;
		$prevMassMilestone = $massMilestone - 1;
		$massPercent = ( round($massMass/1000000, 4, PHP_ROUND_HALF_EVEN ) - $prevMassMilestone) / 1 * 100;
	?>
	
	<article id="content-1" class="show">
		<h2>
			While body mass is a critically important life history trait that covaries and scales with a suite of other variables, it is surprisingly difficult to find verified data outside a few well-studied, charismatic groups. MassBase aims to collate reliable body mass data across the whole spectrum of animal life, from snails to whales, lice to mice.
		</h2>
		<div class="column-left">
			<h3>Large and diverse specimen archive</h3>
			<p>The large and diverse specimen archive at BIO allow us access to a huge data source for a variety of research interests. As biodiversity scientists, we are striving to maximize the useful information that can be extracted from each specimen and species in our collection, using our available resources. </p>
			<a class="button" id="about-more" href="#about">Learn More</a>
		</div><div class="column-right">
			<h3>When body mass matters</h3>
			<p>Body mass is arguably the most critical variable one can measure for biodiversity, as the number of ecological, physiological, and evolutionary characteristics it covaries with, scales by, or predicts are immense (<a href="http://books.google.ca/books/about/The_Ecological_Implications_of_Body_Size.html?id=OYVxiZgTXWsC" target="_blank">Peters 1983;</a> <a href="http://books.google.ca/books/about/Scaling.html?id=8WkjD3L_avQC&redir_esc=y" target="_blank">Schmidt-Neilsen 1984;</a> <a href="http://www.jstor.org/discover/10.2307/2097086?uid=2129&uid=2&uid=70&uid=4&sid=21104632676863" target="_blank">LaBarbera 1989;</a> <a href="http://books.google.ca/books/about/Size_Function_and_Life_History.html?id=-iBS6-2OO3wC&redir_esc=y" target="_blank">Calder 1996</a>). A massive variance in body mass exists across the Animal Kingdom (at least 15 orders of magnitude), and even between and within closely related species, so explaining the origin and maintenance of this variation is a critical objective of biodiversity science.</p>
		</div>
	</article><article id="content-2">
		<div class="column-left" style="width: 100%;">
			<h3>Built on the foundation of a century</h3>
			<p>All specimens held in the BIC Archive have undergone DNA barcoding, a process by which a small segment of the cytochrome oxidase I (COI) gene is sequenced to identify and delineate species, with all data stored on the Barcode of Life Data Systems (<a href="http://www.boldsystems.org" target="_blank">www.boldsystems.org</a>) database. This small diagnostic segment is compared to the same gene region in other species, and specimens are assigned a Barcode Index Number (BIN) based on their similarity (and dissimilarity) to other specimens in the database. BINs have been shown to be highly congruent to Linnaean species designations (<a href="http://www.plosone.org/article/info%3Adoi%2F10.1371%2Fjournal.pone.0066213" target="_blank">Ratnasingham & Hebert 2013</a>), and are thus built on the foundation of several hundred years of taxonomic tradition. For more information, check out <a href="http://www.ibol.org/about-us/what-is-dna-barcoding/" target="_blank">What is DNA Barcoding?</a>.</p>
		</div>
		
		<div class="column-left" style="width: 35%;padding: 0;vertical-align: middle;">
			<div class="chart" id="chart-quantity" data-percent="<?php echo $quantityPercent ?>" data-value="<?php echo $massTotal ?>">
				<div class="chart-value">
					<h1 id="quantity-label"></h1>
					<h2>specimens</h2>
				</div>
				<div class="chart-milestone">
					<h2>next milestone</h2>
					<h1><?php echo $quantityMilestone ?></h1>
					<h2>specimens</h2>
				</div>
			</div>
		</div><div class="column-right" style="width: 65%;vertical-align: middle;padding-left: 0;">
			<h3>Built on the foundation of millions</h3>
			<p>MassBase was founded in the Bio-Inventory and Collections Unit of the Biodiversity Institute of Ontario (BIO), affiliated with the University of Guelph in Ontario, Canada. The Bio-Inventory and Collections Unit (BIC) houses an archive of animal specimens both collected and DNA barcoded by BIO. While the majority of its holdings are terrestrial arthropods, it all covers the wide diversity of animal groups and their habitats, from aquatic mites to marine fishes. As of August 2014, the archive holds over 1 million specimens &ndash; all of which are completely digitized.</p>
		</div>
		
		<div class="column-left" style="width: 65%;vertical-align: middle;padding-right: 0;">
			<h3>Scalability</h3>
			<p>In order to populate and parametrize MassBase, specimens from the BIC archive are selected to be weighed based on their BIN. They are uploaded into MassBase with several associated data fields (e.g. method, source), and can be accessed with the option to search for samples by both traditional taxonomic identifications and BIN designations. MassBase will also be adding mass data from published scientific literature and other biodiversity data repositories (e.g. FishBase, Avibase), and is preparing to accept data submissions from other researchers.</p>
			<a class="button" id="about-less" href="#about">Go Back</a>
		</div><div class="column-right" style="width: 35%;padding: 0;vertical-align: middle;">
			<div class="chart" id="chart-mass" data-percent="<?php echo $massPercent ?>" data-value="<?php echo round($massMass/1000000, 4, PHP_ROUND_HALF_EVEN ) ?>">
				<div class="chart-value">
					<h1 id="mass-label"></h1>
					<h2>kilograms</h2>
				</div>
				<div class="chart-milestone">
					<h2>next milestone</h2>
					<h1><?php echo $massMilestone ?></h1>
					<h2><?php echo ( $massMilestone == 1 ? 'kilogram' : 'kilograms' ) ?></h2>
				</div>
			</div>
		</div>
	</article>
</section>

<!--
	<p>
	In order to populate and parametrize MassBase, specimens from the BIC archive are selected to be weighed based on their BIN. They are uploaded into MassBase with several associated data fields (e.g. method, source), and can be accessed with the option to search for samples by both traditional taxonomic identifications and BIN designations. MassBase will also be adding mass data from published scientific literature and other biodiversity data repositories (e.g. FishBase, Avibase), and is preparing to accept data submissions from other researchers.
	</p>
-->
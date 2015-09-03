<section id="mp-menu" class="mp-menu">
	<div class="mp-level" id="level-class" data-level="1">
		<h2 data-icon="C">Class</h2>
		<div class="mp-list">
			<div class="mp-back" href="#">back</div>
			<input class="mp-search" type="text" onkeyup="search(this)" placeholder="Search" />
			<div class="taxon-list">
			<ul>
				<li class="icon icon-arrow-left" data-tax-id="82">
					<span class="name">Insecta</span>
					<a href="browseresults.php?searchby=class&searchterm=82&sortby=binasc&page=1">View all</a>
				</li>
			</ul>
			</div>
		</div>
		<div class="mp-close"></div>
		<div class="mp-overlay"></div>
	</div>
	<div class="mp-level" id="level-order" data-level="2">
		<h2 data-icon="O">Order</h2>
		<div class="mp-list">
			<div class="mp-back" href="#">back</div>
			<input class="mp-search" type="text" onkeyup="search(this)" placeholder="Search" />
			<div class="taxon-list">
			</div>
		</div>
		<span class="mp-close"></span>
		<div class="mp-overlay"></div>
	</div>
	<div class="mp-level" id="level-family" data-level="3">
		<h2 data-icon="F">Family</h2>
		<div class="mp-list">
			<div class="mp-back" href="#">back</div>
			<input class="mp-search" type="text" onkeyup="search(this)" placeholder="Search" />
			<div class="taxon-list">
			</div>
		</div>
		<span class="mp-close"></span>
		<div class="mp-overlay"></div>
	</div>
	<div class="mp-level" id="level-family" data-level="4">
		<h2 data-icon="G">Genus</h2>
		<div class="mp-list">
			<div class="mp-back" href="#">back</div>
			<input class="mp-search" type="text" onkeyup="search(this)" placeholder="Search" />
			<div class="taxon-list">
			</div>
		</div>
		<span class="mp-close"></span>
		<div class="mp-overlay"></div>
	</div>
	<div class="mp-level" id="level-species" data-level="5">
		<h2 data-icon="S">Species</h2>
		<div class="mp-list">
			<div class="mp-back" href="#">back</div>
			<input class="mp-search" type="text" onkeyup="search(this)" placeholder="Search" />
			<div class="taxon-list">
			</div>
		</div>
		<span class="mp-close"></span>
		<div class="mp-overlay"></div>
	</div>
</section>
<div class="mp-overlay"></div>
<script> 
	function search(input) { 
		var s = input.value.toLowerCase(); 
		$(input).parent().find('li').each(function(){ 
			if ( $(this).text().toLowerCase().indexOf(s) > -1 ) { 
				$(this).slideDown(150);
			} else { 
				$(this).slideUp(150);
			} 
		}); 
	} 
</script>
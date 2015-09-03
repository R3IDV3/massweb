<section id="search">
	<a href="#search"><div id="search-help" class="help md-trigger" data-modal="help-modal"></div></a>
	<form id="nl-form" class="nl-form" action="results.php">
		<span style="font-weight: 400;">Search</span> by
		<select name="searchby" data-title="Taxonomy" data-description="Select from the dropdown menu a category by which to search.">
			<option value="taxonomy" selected>taxonomy</option>
			<option value="binid">bin id</option>
			<option value="project">project</option>
			<option value="processid">process id</option>
		</select>:
		<br/>I'm looking for <input type="text" name="searchterm" value="" placeholder="anything" data-subline="For example: <em>Insecta</em> or <em>Nola</em>" data-title="Search term" data-description="Type a search term in the text box. You may separate multiple search terms by commas."/>
		<input type="hidden" name="sortby" value="binasc">
		<br />between
		<input type="text" name="greaterthan" value="" placeholder="any weight" data-subline="In <em>mg</em>" data-title="Weight lower bound" data-description="Type a number for the lower bound in the text box. It is acceptable to leave this field blank. The default is no lower bound."/>
		and 
		<input type="text" name="lessthan" value="" placeholder="any weight" data-subline="In <em>mg</em>" data-title="Weight upper bound" data-description="Type a number for the upper bound in the text box. It is acceptable to leave this field blank. The default is no upper bound."/>
		mg.
		<input type="hidden" name="page" value="1">
		<div class="nl-submit-wrap">
			<button class="nl-submit" type="submit">Discover</button>
		</div>
		<div class="nl-overlay"></div>
	</form>
	
	<div class="modal" id="help-modal">
		<div class="content">
		</div>
	</div>
	<div class="overlay"></div><!-- the overlay element -->
</section>
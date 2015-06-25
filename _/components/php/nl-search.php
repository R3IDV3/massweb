<section id="search">
	<div id="search-help" class="help" onclick="toggleHelp()"></div>
	<form id="nl-form" class="nl-form">
		By 
		<select data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">
			<option value="1" selected>taxonomy</option>
			<option value="2">bin id</option>
			<option value="3">project</option>
			<option value="4">process id</option>
		</select>,
		<br/>I'm looking for <input type="text" value="" placeholder="anything" data-subline="For example: <em>Insecta</em> or <em>Nola</em>"/>
		<br />between
		<input type="text" value="" placeholder="any weight" data-subline="In <em>mg</em>"/>
		and 
		<input type="text" value="" placeholder="any weight" data-subline="In <em>mg</em>"/>
		.
		<div class="nl-submit-wrap">
			<button class="nl-submit" type="submit">Discover</button>
		</div>
		<div class="nl-overlay"></div>
	</form>
</section>
<section class="main">
  <div class="jumbotron text-center" style="padding-bottom:35px">
    <legend><H3><label for="search">Upload Data to MassBase</label></H3></legend>
      <div class="container">
        <form class="form-inline" role="form" action="upload.php" method="post" enctype="multipart/form-data">
          
          <div class="form-group pull-left text-right" style="width: 50%;">

            <div style="height: 50px;">
				<label for="newProject">Upload New Project?</label>
				<input id="newProject" type="checkbox" name="newProject" value="new-project">
            </div>
            
            <div style="height: 50px;">
				<label for="newPin">Upload New Pin?</label>
				<input id="newPin" type="checkbox" name="newPin" value="new-pin">
            </div>
            	
            <div style="height: 50px;">
				<label for="newBIN">Upload New BIN?</label>
				<input id="newBIN" type="checkbox" name="newBIN" value="new-BIN"> 
            </div>
            
            <div style="height: 50px;">
	            <label for="specimenFile">Upload specimen data:*</label><br>
            </div>
            
          </div><!-- form-group left -->
          
          <div class="form-group pull-right text-left" style="width: 50%;">
				<div style="height: 50px; margin-left: 25px;">
	            	<div class="form-group" id="newProjectForm" style="display: none;">
						<input class="form-control" type="file" name="newProjectFile" id="newProjectFile">
            		</div>
            	</div><!-- newProjectForm -->
            	<div style="height: 50px; margin-left: 25px;">
	            	<div class="form-group" id="newPinForm" style="display: none;">
						<input class="form-control" type="file" name="newPinFile" id="newPinFile">
            		</div>
            	</div><!-- newPinForm -->
            	<div style="height: 50px; margin-left: 25px;">
	            	<div class="form-group" id="newBINForm" style="display: none;">
						<input class="form-control" type="file" name="newBINFile" id="newBINFile">
            		</div>
            	</div><!-- newBINForm -->
				
				<div style="height: 50px; margin-left: 25px;">
					<input class="form-control" type="file" name="specimenFile" id="specimenFile"><br>
				</div>
          </div><!-- form-group right -->
          
          <input class="btn btn-success" type="submit" value="Upload Files" name="submit">
        
        </form>
      </div><!-- container -->
  </div><!-- jumbotron -->
</section> <!-- main -->

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script>

$(document).ready(function() {
	$("input[type='checkbox']").change(function() {
	    var id = "#" + this.id + "Form"
	    if (this.checked) {
		    $(id).fadeIn(250)
	    } else {
		    $(id).fadeOut(250)
	    }
	});
});
</script>
<section class="main">
  <div class="jumbotron text-center" style="padding-bottom:35px">
    <legend><H3><label for="search">Upload Data to MassBase</label></H3></legend>
      <div class="container">
        <form class="form-inline" role="form" action="upload.php" method="post" enctype="multipart/form-data">
          <div class="form-group">

            <label class="sr-only" for="fileToUpload">Select file to upload:</label>
            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            <input class="btn btn-success" type="submit" value="Upload File" name="submit">
            
          </div><!-- form-group -->
        </form>
      </div><!-- container -->
  </div><!-- jumbotron -->
</section> <!-- main -->
      
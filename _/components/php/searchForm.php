<section class="main">
  <div class="jumbotron text-center" style="padding-bottom:35px">
    <legend><H3><label for="search">Search MassBase</label></H3></legend>
      <div class="container">
        <form class="form-inline" role="form" action="results.php">
          <div class="form-group">

            <label class="sr-only" for="searchterminput">Search Term</label>
            <input class="form-control" type="text" name="searchterm" id="searchterm" autofocus placeholder="Search Term" size="70px">
         
          
            <label class="sr-only" for="searchby">Search By</label>
            <select class="form-control" name="searchby" id="searchby" style="width:100px">
              <option value="taxonomy"> Taxonomy</option>
              <option value="binid"> BIN ID</option>
              <option value="project"> Project</option>
              <option value="processid"> Process ID</option>
            </select>
          
            <label for="sortby" class="sr-only">Sort By</label>
            <select name="sortby" id="sortby" class="form-control" style="width:180px">
              <option id="bindasc" value="binasc">BIN: Ascending</option>
              <option id="bindesc" value="bindesc">BIN: Descending</option>
              <option id="weightdesc" value="weightdesc">Weight: High->Low</option>
              <option id="weightasc" value="weightasc">Weight: Low->High</option>
              <option id="speciesasc" value="speciesasc">Species: A->Z</option>
              <option id="speciesdesc" value="speciesdesc">Species: Z->A</option>
              <option id="projectdesc" value="projectdesc">Project: A->Z</option>
              <option id="projectasc" value="projectasc">Project: Z->A</option>
            </select>
        
            <span class="help-block" style="font-size:11pt" ><small><em>For multiple search items, separate with comma and no spaces. (ex. NSWHJ951-10,NSWHJ045-10) </em></small></span>
             
            <div><!-- size section -->
              <section class="form-inline">
                  <select name="greaterchoice" id="greaterchoice" class="form-control" style="width:180px">
                    <option id="gte" value="gte">Greater Than Equal To</option>
                    <option id="gt" value="gt">Greater Than</option>
                    <option id="eq" value="eq">Equal To</option>
                  </select>
                
                    <input type="text" id="greaterthan" name="greaterthan" class="form-control" style="width:80px">
                    <label>mg </label>
                  
                  <select name="lessthanchoice" id="lessthanchoice" class="form-control" style="width:180px">
                    <option id="lte" value="lte">Less Than Equal To</option>
                    <option id="lt" value="lt">Less Than</option>
                  </select>
                
                    <input type="text" id="lessthan" name="lessthan" class="form-control" style="width:80px">
                    <label>mg</label>
                
              </section><!-- range form group -->
              <input style="display:none" name="page" value="1">
            </div> <!-- size section -->
            
            <div>
              <br>
              <button type="button" class="btn btn-danger" onClick="
                  this.form.elements['searchterm'].value=''; 
                  this.form.elements['searchby'].value='taxonomy'; 
                  this.form.elements['sortby'].value='binasc'; 
                  this.form.elements['greaterchoice'].value='gte'; 
                  this.form.elements['lessthanchoice'].value='lte';
                  this.form.elements['lessthan'].value='';
                  this.form.elements['greaterthan'].value='';
                  ">
                  Reset
              </button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div><!-- form-group -->
        </form>
      </div><!-- container -->
  </div><!-- jumbotron -->
</section> <!-- main -->
      
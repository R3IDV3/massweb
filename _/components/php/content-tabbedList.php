<?php include "query-tabData.php"; ?>
<?php include "query-massbasestats.php"; ?>

<!--tabbed list of taxonomy results-->
<ul class="nav nav-tabs">
  <li class="active"><a href="#class" data-toggle="tab">  Class  </a></li>
  <li><a href="#order" data-toggle="tab">  Order  </a></li>
  <li><a href="#family" data-toggle="tab">  Family  </a></li>
  <li><a href="#genus" data-toggle="tab">  Genus  </a></li>
  <li><a href="#species" data-toggle="tab">  Species  </a></li>
  <li><a href="#bin" data-toggle="tab">  BIN  </a></li>
  <li><a href="#project" data-toggle="tab">  Project  </a></li>
  <li><a href="#lightest" data-toggle="tab">  Lightest  </a></li>
  <li><a href="#heaviest" data-toggle="tab">  Heaviest  </a></li>
</ul>

<!-- text for each callout -->

<div class="tab-content">
  <!-- Class -->
  <div class="tab-pane fade active in" id="class">
    <section>
    <p>
      <h6><legend><?php echo "Showing " . count($class) . " Distinct Classes of " . $massStats['class'] . " Total Classes"; ?></legend></h6>
    </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Class</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
            
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($class); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=class&searchterm=<?php echo $class[$i]['class_id']; ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $class[$i]['name']; ?></a></td>
                <td><?php echo $class[$i]['NUM']; ?></td>
                <?php if($class[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($class[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($class[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($class[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($class[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($class[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- class table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=class&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Classes >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- class tab pane -->

  <!-- Order -->
  <div class="tab-pane fade" id="order">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($order) . " Distinct Orders of " . $massStats['order'] . " Total Orders"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Order</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i = 0; $i < count($order); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=order&searchterm=<?php echo $order[$i]['order_id']; ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $order[$i]['name']; ?></a></td>
                <td><?php echo $order[$i]['NUM']; ?></td>
                <?php if($order[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($order[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($order[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($order[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($order[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($order[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- order table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=order&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Orders >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- order tab pane -->

  <!-- Family -->
  <div class="tab-pane fade" id="family">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($family) . " Distinct Families of " . $massStats['family'] . " Total Families"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Family</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($family); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=family&searchterm=<?php echo $family[$i]['family_id']; ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $family[$i]['name']; ?></a></td>
                <td><?php echo $family[$i]['NUM']; ?></td>
                <?php if($family[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($family[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($family[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($family[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($family[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($family[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- family table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=family&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Families >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- family tab pane -->

  <!-- Genus -->
  <div class="tab-pane fade" id="genus">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($genus) . " Distinct Genera of " . $massStats['genus'] . " Total Genera"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Genus</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i = 0; $i < count($genus); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=genus&searchterm=<?php echo $genus[$i]['genus_id']; ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $genus[$i]['name']; ?></a></td>
                <td><?php echo $genus[$i]['NUM']; ?></td>
                <?php if($genus[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($genus[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($genus[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($genus[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($genus[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($genus[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- genus table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=genus&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Genera >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- genus tab pane -->

  <!-- Species -->
  <div class="tab-pane fade" id="species">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($species) . " Distinct Species of " . $massStats['species'] . " Total Species"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Species</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($species); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=species&searchterm=<?php echo $species[$i]['species_id']; ?>&sortby=binasc&page=1" class="btn btn-success btn-xs" role="button"><?php echo $species[$i]['name']; ?></a></td>
                <td><?php echo $species[$i]['NUM']; ?></td>
                <?php if($species[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($species[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($species[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($species[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($species[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($species[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- species table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=species&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Species >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- species tab pane -->

  <!-- BIN -->
  <div class="tab-pane fade" id="bin">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($bin) . " Distinct BINs of " . $massStats['bin'] . " Total BINs"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>BIN ID</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($bin); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=bin&searchterm=
                  <?php echo $bin[$i]['bin_id']; ?>&sortby=binasc
                  &page=1" class="btn btn-success btn-xs" role="button">
                  <?php 
                    if(strcmp($bin[$i]['bin_id_bold'], "") == 0)
                    {
                      echo "NO BIN"; 
                    }
                    else
                    {
                      echo $bin[$i]['bin_id_bold'];
                    }
                  ?>
                </a></td>
                <td><?php echo $bin[$i]['NUM']; ?></td>
                <?php if($bin[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($bin[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($bin[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($bin[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($bin[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($bin[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- bin table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=bin&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all BINs >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- bin tab pane -->

  <!-- Project -->
  <div class="tab-pane fade" id="project">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($project) . " Distinct Projects of " . $massStats['project'] . " Total Projects"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Project</th>
            <th>Number of Specimens</th>
            <th>Avg Mass (mg)</th>
            <th>Min Mass (mg)</th>
            <th>Max Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($project); $i++): ?>
              <tr>
                <td><a href="browseresults.php?searchby=project&searchterm=<?php echo $project[$i]['project_id']; ?>&page=1" class="btn btn-success btn-xs" role="button"><?php echo $project[$i]['project_code']; ?></a></td>
                <td><?php echo $project[$i]['NUM']; ?></td>
                <?php if($project[$i]['avg'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>  
                  <td><?php echo number_format($project[$i]['avg'], 1); ?></td>
                <?php endif; ?>
                <?php if($project[$i]['min'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>  
                  <td><?php echo number_format($project[$i]['min'], 1); ?></td>
                <?php endif; ?>
                <?php if($project[$i]['max'] < 0): ?>
                  <td>0.0 <sup> *</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($project[$i]['max'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- project table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=project&sortby=nsdesc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Projects >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- project tab pane -->

  <!-- Lightest -->
  <div class="tab-pane fade" id="lightest">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($lightest) . " Distinct Specimens of " . $massStats['total'] . " Total Specimens"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Species</th>
            <th>Process ID</th>
            <th>Mass (mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($lightest); $i++): ?>
              <tr>
                <td><?php echo $lightest[$i]['name']; ?></td>
                <td><a href="specimenpage.php?id=<?php echo $lightest[$i]['process_id']; ?>&page=1" target="_blank" class="btn btn-success btn-xs" role="button" onclick="window.open('specimenpage.php?id=<?php echo $lightest[$i]['process_id']; ?>', 'newwindow', 'width=770, height=730'); return false;"><?php echo $lightest[$i]['process_id']; ?></a></td>
                <?php if($lightest[$i]['weight_minus_pin'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($lightest[$i]['weight_minus_pin'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- lightest table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=lightest&sortby=massasc&page=1" class="btn btn-info btn-xs pull-left" role="button">See all Specimens >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- lightest tab pane -->

  <!-- Heaviest -->
  <div class="tab-pane fade" id="heaviest">
    <section>
      <p>
        <h6><legend><?php echo "Showing " . count($heaviest) . " Distinct Specimens of " . $massStats['total'] . " Total Specimens"; ?></legend></h6>
      </p>
    </section>
    <div class="table-responsive">
      <table class="table table-striped table-condensed table-hover table-bordered">
        <thead>
          <tr>
            <th>Species</th>
            <th>Process ID</th>
            <th>Mass(mg)</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($heaviest); $i++): ?>
              <tr>
                <td><?php echo $heaviest[$i]['name']; ?></td>
                <td><a href="specimenpage.php?id=<?php echo $heaviest[$i]['process_id']; ?>&page=1" target="_blank" class="btn btn-success btn-xs" role="button"  onclick="window.open('specimenpage.php?id=<?php echo $heaviest[$i]['process_id']; ?>', 'newwindow', 'width=770, height=730'); return false;"><?php echo $heaviest[$i]['process_id']; ?></a></td>
                <?php if($heaviest[$i]['weight_minus_pin'] < 0): ?>
                  <td>0.0<sup>*</sup></td>
                <?php else: ?>
                  <td><?php echo number_format($heaviest[$i]['weight_minus_pin'], 1); ?></td>
                <?php endif; ?>
              </tr>
          <?php endfor; ?>
        </tbody>
      </table>
    </div><!-- heaviest table -->
    <row>
      <div class="clearfix"><!-- button and warning div -->
        <p><a href="browseresults.php?searchby=heaviest&sortby=massdesc&page=1" class="btn btn-info btn-xs pull-left" role="button" >See all Specimens >></a></p>
        <?php include "content-disclaimerMessage.php"; ?>
      </div><!-- button and warning div -->
    </row>
  </div><!-- heaviest tab pane -->

</div> <!-- End of tabbed list -->
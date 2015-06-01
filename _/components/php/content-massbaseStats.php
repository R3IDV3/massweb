<?php include "_/components/php/query-indexStats.php"; ?>

<div>
  <p><?php echo "MassBase contains " . $massTotal . " specimens with a total mass of "
    . round($massMass/1000000, 4, PHP_ROUND_HALF_EVEN ) . " kilograms."; ?></p>
</div><!-- jumbotron text -->

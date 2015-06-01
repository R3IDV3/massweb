<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_GET['searchterm']; ?>MassBase - Specimen Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="_/css/mystyles.css" rel="stylesheet" media="screen">
    </head>
    <body id="search">

        <section class="container">
            <div class="content row">
                <?php include "_/components/php/header-specimen.php"; ?>
                <section class="main col col-lg-12">
                    <?php include "_/components/php/query-specimen.php"; ?>
                    <?php include "_/components/php/content-specimendetails.php"; ?>
                </section>
            </div><!-- content -->
        </section><!-- container -->

        <script src="_/js/bootstrap.js"></script>
        <script src="_/js/myscript.js"></script>
    </body>
</html>

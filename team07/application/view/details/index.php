<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--    <title>Portfolio Item - Start Bootstrap Template</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($listing->title)) echo htmlspecialchars($listing->title, ENT_QUOTES, 'UTF-8'); ?>
                <small><?php if(isset($listing->address)) echo htmlspecialchars($listing->address, ENT_QUOTES, 'UTF-8'); ?>></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-6">
            <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($listing->image).
                '"max-height="750px" max-width="500px" class = "img-responsive"/>' ?>
            <img class="img-responsive" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-6">
            <h3>Listing Description</h3>
            <p><?php if (isset($listing->description)) echo htmlspecialchars($listing->id, ENT_QUOTES, 'UTF-8'); ?></p>
            <h3>Listing Details</h3>
            <ul>
                <li>Square Feet: TODO ADD SQUARE FEET TO LISTINGS TABLE AND LISTING FORM </li>
                <li>Price: <?php if (isset($listing->price)) echo htmlspecialchars($listing->id, ENT_QUOTES, 'UTF-8'); ?> </li>
                <li>Beds: TODO: ADD BEDS COL IN DATABASE AND TO ADD LISTING FORM </li>
                <li>Bathrooms: TODO: ADD # OF BATHROOMS TO LISTINGS TABLE AND LISTINGS FORM </li>
            </ul>
        </div>

    </div>
    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Location</h2>
        </div>
        <div class="col-md-6">
            <p>TODO ADD STRING TO TABLE FOR FOLLOWING VALUES: Nearby Points of Interest</p>
            <ul>
                <li>List of points of interest
                </li>
                <li>or something cool about sfsu nearby</li>
                <li>or some stuff</li>
                <li>perhaps parks?</li>
                <li>grocery stores?</li>
                <li>how close to school?</li>
            </ul>
            <p>TODO FIGURE OUT WHAT TO PUT HERE: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/700x450" alt="">
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Content -->
    <!--  <div class="container"> -->

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Additional Features and Contact Information
            </h1>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> Amenities</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <ul><li>List of amenities</li></ul>
                    </p>
                    <!--  <a href="#" class="btn btn-default">Learn More</a> -->
                </div>
            </div>
        </div>
        <!-- Begin Lease Information -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i> Lease Information</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <ul style="list-style: none">
                        <li>Start Date: *insert start date*</li>
                        <br></br>
                        <li>End Date: *insert end date*</li>
                    </ul>
                    </p>
                    <!--  <a href="#" class="btn btn-default">Learn More</a> -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-compass"></i> Contact Information</h4>
                </div>
                <div class="panel-body">
                    <p>NAME: <?php if(isset($listing->first_name)) echo htmlspecialchars($listing->first_name, ENT_QUOTES, 'UTF-8')." ".htmlspecialchars($listing->last_name,ENT_QUOTES,'UTF-8'); ?></p>
                    <p>EMAIL: <?php if(isset($listing->email)) echo htmlspecialchars($listing->email, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p> PHONE: <?php if(isset($listing->phone_number)) echo htmlspecialchars($listing->phone_number, ENT_QUOTES, 'UTF-8') ?> </p>
                    <!-- !!!!!!! Connect Messages !!!!!!!!! -->
                    <a href="#" class="btn btn-default">Message</a>
                </div>
            </div>
        </div>
        <!--  </div> -->
        <!-- /.row -->

        <!--
                <!-- /.row

                <!-- Related Projects Row
                <div class="row">

                    <div class="col-lg-12">
                        <h3 class="page-header">Related Projects</h3>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                </div>
                <!-- /.row
        -->

        <hr>
        <!--
                <!-- Footer
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright &copy; Your Website 2014</p>
                        </div>
                    </div>
                    <!-- /.row
                </footer>

            </div>
        -->
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>




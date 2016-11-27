




<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($listing->title)) echo htmlspecialchars($listing->title, ENT_QUOTES, 'UTF-8'); ?>
                <small><?php if(isset($listing->address)) echo htmlspecialchars($listing->address, ENT_QUOTES, 'UTF-8'); ?></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-6">
            <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($listing->image).
                '"max-height="750px" max-width="500px" class = "img-responsive"/>' ?>
        </div>

        <div class="col-md-6">
            <h3>Listing Description</h3>
            <p><?php if (isset($listing->description)) echo htmlspecialchars($listing->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <h3>Listing Details</h3>
            <ul>
                <li>Square Feet: <?php if(isset($listing->square_feet)) echo htmlspecialchars($listing->square_feet, ENT_QUOTES, 'UTF-8');?></li>
                <li>Price: <?php if (isset($listing->price)) echo htmlspecialchars($listing->id, ENT_QUOTES, 'UTF-8'); ?> </li>
                <li>Bedrooms: <?php if(isset($listing->bed_rooms)) echo htmlspecialchars($listing->bed_rooms, ENT_QUOTES, 'UTF-8');?> </li>
                <li>Bathrooms: <?php if(isset($listing->bathrooms)) echo htmlspecialchars($listing->bathrooms,ENT_QUOTES,'UTF-8')?></li>
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
                    <p>List of Amenities
                    <ul>
                        <?php if($listing->private_room) : ?>
                        <li>Private Room</li>
                        <?php if($listing->laundry_on_site) : ?>
                        <li>Laundry Available on Site</li>
                        <?php if($listing->utilities_included) : ?>
                        <li>Utilities Included</li>
                        <?php if($listing->dogs_ok) : ?>
                        <li>Dogs Allowed</li>
                        <?php if($listing->cats_ok) : ?>
                        <li>Cats Allowed</li>
                    </ul>
                    </p>
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
                        <li>Start Date: <?php if(isset($listing->move_in_date)) echo
                                htmlspecialchars($listing->move_in_date, ENT_QUOTES, 'UTF-8');?></li>
                        <br>
                        <li>End Date: <?php if(isset($listing->lease_end_date)) echo
                    htmlspecialchars($listing->lease_end_date, ENT_QUOTES, 'UTF-8');?></li>
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







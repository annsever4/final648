<div id="messageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Message</h4>
            </div>
            <form method="POST" onsubmit="newConversationMessage(this);return false;">
                <div class="modal-body form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Type your message here..." rows="4"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-success pull-right" type="submit" name="submit">
                        <i class="glyphicon glyphicon-send"></i> Send
                    </button>
                    <button type="button" class="btn btn-default hide" data-dismiss="modal" name="close" id="close">Close</button>
                </div>
                <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo $listing->owner_id; ?>" />
            </form>
        </div>
    </div>
</div>





<!-- Page Content -->
<div class="container border-col" id="details-page">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header row-border" style="border-bottom: 1px solid;"><?php if(isset($listing->title)) echo htmlspecialchars($listing->title, ENT_QUOTES, 'UTF-8'); ?>
                <small><?php if(isset($listing->address)) echo htmlspecialchars($listing->address, ENT_QUOTES, 'UTF-8'); ?></small>
                <a href="#" title="message" style="margin-left:50px;" data-toggle="modal" data-target="#messageModal"><b><i class="glyphicon glyphicon-envelope btn btn-primary btn-lg im-bold" style="font-size:20px"> Contact</i></b></a> 
                <a href="#" title="favorite"  ><b><i class="glyphicon glyphicon-heart btn btn-danger btn-lg im-bold" style="font-size:20px"> Favorite</i></b></a> 
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
            <h2 class="page-header" style="border-bottom: 1px solid;">Location</h2>
        </div>
        <div class="col-md-6">
        <div class="col-md-6" id = 'map' style= 'width:400px; height:280px;'>

<!--            <img class="img-responsive" src="http://placehold.it/700x450" alt="">-->
        </div> 
        </div>
        <div class="col-md-6">
	<div class="panel panel-default">
                <div class="panel-heading" id="contact-info">
                    <h4><i class="fa fa-fw fa-check"></i> Amenities</h4>
                </div>
                <div class="panel-body" id="contact-info">
                    <p>List of Amenities
                    <ul>
                        <?php if($listing->private_room) : ?>
                        <li>Private Room</li>
                        <?php endif; ?>

                        <?php if($listing->laundry_on_site) : ?>
                        <li>Laundry Available on Site</li>
                        <?php endif; ?>

                        <?php if($listing->utilities_included) : ?>
                        <li>Utilities Included</li>
                        <?php endif; ?>

                        <?php if($listing->dogs_ok) : ?>
                        <li>Dogs Allowed</li>
                        <?php endif; ?>

                        <?php if($listing->cats_ok) : ?>
                        <li>Cats Allowed</li>
                        <?php endif; ?>
                    </ul>
                    </p>
                </div>
		</div>
	</div>
    </div>
    <!-- /.row -->

    <!-- Page Content -->
    <!--  <div class="container"> -->

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="border-bottom: 1px solid;">
                Additional Features and Contact Information
            </h1>
        </div>
        <!-- Begin Lease Information -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i> Lease Information</h4>
                </div>
                <div class="panel-body" id="contact-info">
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
                <div class="panel-body" id="contact-info">
                    <p>NAME: <?php if(isset($listing->first_name)) echo htmlspecialchars($listing->first_name, ENT_QUOTES, 'UTF-8')." ".htmlspecialchars($listing->last_name,ENT_QUOTES,'UTF-8'); ?></p>
                    <p>EMAIL: <?php if(isset($listing->email)) echo htmlspecialchars($listing->email, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p> PHONE: <?php if(isset($listing->phone_number)) echo htmlspecialchars($listing->phone_number, ENT_QUOTES, 'UTF-8') ?> </p>
                    <!-- !!!!!!! Connect Messages !!!!!!!!! -->
                    <a href="#" title="message" style="width:25%" data-toggle="modal" data-target="#messageModal"><i class="glyphicon glyphicon-envelope btn btn-primary btn-lg" style="font-size:20px"> Contact</i></a>
                </div>
            </div>
        </div>


        




        <?php

        //if($_POST['address']) {

            //$address = strip_tags(Request::post('address'));
        $address = $listing->address;
           # echo $address;

            //google map geocode api url
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyCP0FlO1B2ZZC5srVzlzpnnPjgZy2GysrQ';
//        echo $url;

            //get the json response
            $resp_json = file_get_contents($url);
//        echo $resp_json;

            //decode the json
            $resp = json_decode($resp_json, true);

            if ($resp['status'] == 'OK') {
                //get the lati and longti
                $lati = $resp['results'][0]['geometry']['location']['lat'];
                $longi = $resp['results'][0]['geometry']['location']['lng'];
                $formatted_address = $resp['results'][0]['formatted_address'];
//                echo $lati;
//                echo $longi;
//                echo $formatted_address;

//                echo"
//            <div id = 'map' style='width:500px; height:500px;'>
//            Here I am from php
//            </div>
//            ";

                echo "

<script>
    var latitude =  $lati;
    var longitude = $longi;
      

      
      function initMap() {
        
       <!-- var uluru = {lat: -25.363, lng: 131.044}; -->
       
       var uluru = new google.maps.LatLng(latitude.toFixed(10),longitude.toFixed(10));
        
        <!-- var location= new google.maps.LatLng(parseFloat('<?php echo $lati;?>'),parseFloat('<?php echo $longi;?>')), -->
        <!-- var uluru = new google.maps.LatLng( lat.toFixed(10), lng.toFixed(10) ); -->
        

        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru,
          scaleControl: false,
          scrollWheel: false,
          panControl: false,
          draggable: false,
          minZoom: 15,
          maxZoom: 15,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }

google.maps.event.addDomListener(window,'load',initMap);
console.log('I am here');
</script>





        
        
        
";
                //Verify if data is complete
                if ($lati && $longi && $formatted_address) {
                    //put the data in the array
                    $data_arr = array();

                    array_push(
                        $data_arr,
                        $lati,
                        $longi,
                        $formatted_address
                    );
                }

                //if able to geocode the address

                $latitude = $data_arr[0];
                $longitude = $data_arr[1];
                $formatted_address = $data_arr[2];
            //}
        }
        ?>




<div id = "gmap" > Loading map...</div >
<div id = 'map-lable' > Map shows approximate location .</div >



<?php

    if($_POST['address']) {

        $address = strip_tags(Request::post('address'));

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
            echo $lati;
            echo $longi;
            echo $formatted_address;

            echo"
            <div id = 'map' style='width:500px; height:500px;'>
            Here I am from php
            </div>
            ";

            echo "

<script>
    var latitude = <?php echo $lati; ?>;
    var longitude = <?php echo $longi ?>;
      

      
      function initMap() {
        
       <!-- var uluru = {lat: -25.363, lng: 131.044}; -->
       
       var uluru = new google.maps.LatLng(latitude.toFixed(10),longitude.toFixed(10));
        
        <!-- var location= new google.maps.LatLng(parseFloat('<?php echo $lati;?>'),parseFloat('<?php echo $longi;?>')), -->
        <!-- var uluru = new google.maps.LatLng( lat.toFixed(10), lng.toFixed(10) ); -->
        

        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
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
        }








    }



 ?>

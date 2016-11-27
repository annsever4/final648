
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





echo "

<script>
      function initMap() {
        
        var myOptions = {
            zoom:14,
            center: new google.maps.LatLng(-34.397,150.644),
        };
        
        map = new google.maps.Map(document.getElementById('map'),myOptions);
        marker = new google.maps.Marker({
          
          map: map,
          position:new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>)
        });
        infowindow=new google.maps.infoWindow({
            content:'<?php echo $formatted address;?>'
        });
        google.maps.event.addListener(marker,'click', function(){
            infoWindow.open(map,marker);
        });
        infoWindow.open(map,marker);
      }
<!-- initMap(); -->
google.maps.event.addDomListener(window,'load',initMap);
console.log('I am here');
</script>





        
        
        
";


    }



 ?>

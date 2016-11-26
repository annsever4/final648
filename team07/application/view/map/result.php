
/**
 * Created by PhpStorm.
 * User: lijie
 * Date: 11/26/16
 * Time: 3:14 PM
 */
<body>

</body>
<?php

    if($_POST['address']) {

        $address = strip_tags(Request::post('address'));

        //google map geocode api url
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyDBA9EWB_zNWC6XjDu9mGyIuuV6QSL_ABM';
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
                return $data_arr;
            } else {
                return false;
            }


        } else {
            return false;
        }

        //if able to geocode the address

        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
    }

    ?>


<?php if(isset($data_arr)) { ?>

    <!-- google map will be shown here -->
    <body onload=""
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>


    <!-- JavaScript to show google map -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <!--<script>-->
    <!--function init_map() {-->
    <!--            var myOptions = {-->
    <!--                zoom: 14,-->
    <!--                center: new google.maps.LatLng(--><?php //echo $latitude; ?>//, <?php //echo $longitude; ?>//),
    //                mapTypeId: google.maps.MapTypeId.ROADMAP
    //            };
    //            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
    //            marker = new google.maps.Marker({
    //                map: map,
    //                position: new google.maps.LatLng(<?php //echo $latitude; ?>//, <?php //echo $longitude; ?>//)
    //            });
    //            infowindow = new google.maps.InfoWindow({
    //                content: "<?php //echo $formatted_address; ?>//"
    //            });
    //            google.maps.event.addListener(marker, "click", function () {
    //                infowindow.open(map, marker);
    //            });
    //            infowindow.open(map, marker);
    //        }
    //        google.maps.event.addDomListener(window, 'load', init_map);
    //    </script>

    <script>
    var googleMap = function initialize() {
        console.log("I am here");
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(53.2948557, -6.139267399999994);
        var mapOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), mapOptions);

    }
   googleMap();
    </script>





    <?php

}

?>
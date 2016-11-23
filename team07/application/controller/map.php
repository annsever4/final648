<?php

/**
 * Created by PhpStorm.
 * User: lijie
 * Date: 11/22/16
 * Time: 9:47 PM
 */
class map extends Controller
{

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/map/index.php';
        require APP . 'view/_templates/footer.php';


        
        function geocode()
        {
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


        }

    }

}
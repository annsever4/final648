<?php

/**
 * Created by PhpStorm.
 * User: euphoric
 * Date: 11/26/16
 * Time: 6:56 PM
 */
class Details extends Controller
{
    public function index()
    {
        //target
        $target_listing_id = null;

        if      (Request::get('rental_id')) $target_listing_id = Request::get('rental_id');
        else if (Request::post('listing_detail_id')) $target_listing_id = Request::post('listing_detail_id');

        if($target_listing_id) {

            $listing = $this->model->getDetails($target_listing_id);

            require APP.  'view/_templates/header.php';

            require APP . 'view/details/index.php';

            require APP . 'view/_templates/footer.php';

        } else {

            echo "<script> console.log('model function never called')</script>";

        }

    }

}
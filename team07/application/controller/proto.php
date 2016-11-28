<?php
	
#vert prototype 
class Proto extends Controller
{

	 public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function searchListing()
    {
        //if the form is set  call request class to retrieve _POST values. If they are not set they function will return
        // null
        if (isset($_POST["key"])) { //do Search
            $apartments = $this->model->getListing(Request::post("key"), Request::post('slt_sort_by'),Request::postCheckbox("is_house"),
                Request::postCheckbox("is_apartment"),Request::postCheckbox('is_room'), Request::postCheckbox('laundry_on_site'),
                Request::postCheckbox('dogs_ok'),Request::postCheckbox('cats_ok'), Request::postCheckbox('utilities_included') ,Request::post('min_price'),Request::post('max_price'));
            //$this->index($apartments);
        }

        // loads results view to display data
        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/results.php';
        require APP . 'view/_templates/footer.php';
    }
}



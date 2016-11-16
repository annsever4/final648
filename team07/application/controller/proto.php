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

        if (isset($_POST["key"])) { //do Search
            $apartments = $this->model->getListing(Request::post("key"), Request::post('slt_sort_by'));
            //$this->index($apartments);
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/results.php';
        require APP . 'view/_templates/footer.php';


    }
}



<?php
	
#vert prototype 
class Proto extends Controller
{

	 public function index($xx=null)
    {

        $apartments = $xx;

        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function searchListing()
    {
	 /**
          if (isset($_POST["key"])) { //do Search
                $apartments  = $this->model->getListing($_POST["key"], $_POST["slt_sort_by"]);
         */
	if (isset($_POST["key"])) { //do Search

                $apartments  = $this->model->getListing($_POST["key"]);
        
        }
        $this->index($apartments);

        }
}



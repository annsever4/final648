<?php
	
#vert prototype 
class Proto extends Controller
{

	 public function index($xx=null)
    {

        $appartments = $xx;

        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function searchListing()
    {
          if (isset($_POST["key"])) { //do Search

                $appartments  = $this->model->getListing($_POST["key"]);
        
        }
        $this->index($appartments);

        }
}


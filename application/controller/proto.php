<?php
	
#vert prototype 
class Proto extends Controller
{

	 public function index($xx=null)
    {


        require APP . 'view/_templates/header.php';
        require APP . 'view/proto/index.php';
        require APP . 'view/_templates/footer.php';

    }


}



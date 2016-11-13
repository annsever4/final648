<?php
class registration extends Controller
{
    /**
     * PAGE: registration
     * This method handles user registration when you move to http://yourproject/home/registration
     */
    public function registration()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/registration/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
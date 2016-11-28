<?php
class Profile extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views

        if(isset($_SESSION['logged_in'])) {
           //$profile_information = $this->model->getUserProfileInformation();

            $member_user_listings = $this ->model->getUserLisings($_SESSION['user_id']);

            require APP . 'view/_templates/header.php';
            require APP . 'view/profile/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'login_page/index');
        }
    }

    // called if user needs to update their information
    public function update()
    {
        header('location: ' . URL . 'profile/index');
    }
}

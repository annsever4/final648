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

            //gets all listings user has posted
            $member_user_listings = $this ->model->getUserListings($_SESSION['member_user_id']);

            $all_user_messages = $this->model->getAllMessages();

            require APP . 'view/_templates/header.php';
            require APP . 'view/profile/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // if the user has not logged it directs the user to the log in page
            header('location: ' . URL . 'login_page/index');
        }
    }
    // called if user needs to update their information
    public function update()
    {
        header('location: ' . URL . 'profile/index');
    }
}

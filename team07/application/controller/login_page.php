
<?php
class Login_page extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/login_page/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function loginRegisteredUser()
    {
        $user_email = strip_tags(Request::post('user_email'));
        $user_password = strip_tags(Request::post('user_password'));

        $hash_password = $this->model->getPasswordHash($user_email);

        $password_varification_result = $this->model->password_verify($user_password,$hash_password);
        if($password_varification_result == true){
            //Start the session
            session_start();
        }else{
            //redirect user to the home page
            <html>"The email and username are not correct"</html>
        }

    }

}

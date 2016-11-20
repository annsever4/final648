
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
        $user_email = strip_tags(Request::post('email_input'));
        $user_password = strip_tags(Request::post('password_input'));

       //echo $user_email;

        $hash_password = $this->model->getPasswordHash($user_email);
        //echo $hash_password->password_hash;


        //$hash = $hash_password->password_hash;
            $password_verification_result = password_verify($user_password, $hash_password->password_hash);

        if ($password_verification_result) {
            //Start the session
            session_start();
            $_SESSION['user'] = $user_email;
            $_SESSION['name'] = $this->model->getMemberUsersName($user_email);
            $_SESSION['phone_number'] = $this->model->getMemberUserPhoneNumber($user_email);
            $_SESSION['logged_in'] = true;
            /*
            echo $_SESSION['user'];
            echo $_SESSION['name'];
            echo $_SESSION['phone_number'];
            */
            ob_start();
            echo("Hello " . $user_email);
            $output = ob_get_contents();
            header('location: ' . URL . 'proto/index');
        } else {
            //reloads page so user can try to log in again <invalid email>
            //header('location: ' . URL . 'login_page/index');
            echo $user_password;
            //echo $hash;
        }
    }
}


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

        if ($this->model->emailAlreadyExists($user_email)) {
        $hash_password = $this->model->getPasswordHash($user_email);
        $password_verification_result = password_verify($user_password, $hash_password->password_hash);
            if($password_verification_result == true) {
                //Start the session
                session_start();
                $_SESSION['user'] = $user_email;
                $_SESSION['name'] = $this->model->getUsersName($user_email);
                $_SESSION['phone_number'] = $this->model->getUserPhoneNumber($user_email);
                $_SESSION['logged_in'] = true;
                header('location: ' .URL.'proto/index');
            }
        } else {
             //reloads page so user can try to log in again <invalid email>
             header('location: '.URL.'login_page/index');
        }

    }
}

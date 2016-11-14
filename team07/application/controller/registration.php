<?php
class Registration extends Controller
{
    /**
     * PAGE: registration
     * This method handles user registration when you move to http://yourproject/home/registration
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/registration/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function registerNewUser()
    {
        $user_email = strip_tags(Request::post('user_email'));
        $user_password = strip_tags(Request::post('user_password'));
        $user_password_repeat = strip_tags(Request::post('user_password_repeat'));
        $validation_result = Register::registrationInputValidation( $user_email, $user_password, $user_password_repeat);
        if (!$validation_result) {
            $this->index();
        } else {
            $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
            $this -> model -> registerUser($user_email, $user_password_hash);
            header('location: '. URL . 'proto/index');
        }

    }

}
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
        $user_first_name = strip_tags(Request::post('user_first_name'));
        $user_last_name = strip_tags(Request::post('user_last_name'));
        $user_phone_number = strip_tags(Request::post('user_phone_number'));
        $sfsu_check = strip_tags(Request::post('sfsu_check'));


        $validation_result = Register::registrationInputValidation(
                                                                    $user_email, $user_password,
                                                                    $user_password_repeat, $user_first_name,
                                                                    $user_last_name
                                                                        );

        if (!$validation_result) {

            header('location: '. URL . 'registration/index');

        } else {

            $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
            $this -> model -> registerUser($user_email, $user_password_hash, $user_first_name, $user_last_name, $user_phone_number, $sfsu_check);
            header('location: '. URL . 'proto/index');

        }

    }

}
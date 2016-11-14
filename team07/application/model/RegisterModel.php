<?php

/**
 * Created by PhpStorm.
 * User: logan
 * Date: 11/11/16
 * Time: 12:30 PM
 */
class Register
{
/*
    public static function registerNewUser()
    {
        $user_email = strip_tags(Request::post('user_email'));
        $user_password = strip_tags(Request::post('user_password'));
        $user_password_repeat = strip_tags(Request::post('user_password_repeat'));

        $validation_result = self::registrationInputValidation( $user_email, $user_password, $user_password_repeat);
        if (!$validation_result) {
            return false;
        }

        return true;
    }
*/

    public static function registrationInputValidation($user_email, $user_password, $user_password_repeat)
    {
        if(self::validateUserEmail($user_email) AND self::validatePassword($user_password, $user_password_repeat)){
            return true;
        }
        return false;
    }

    public static function validateUserEmail($user_email)
    {


        if (empty($user_email)) return false;

        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) return false;

        #checks if the user_email already exists in the database
        if(self::emailAlreadyExists($user_email)) return false;

        return true;
    }

    public static function validateUserPassword($user_password, $user_password_repeat)
    {
        if (empty($user_password) OR empty($user_password_repeat)) return false;

        if($user_password !== $user_password_repeat) return false;

        if(strlen($user_password)< 6 OR strlen($user_password >20)) return false;

        return true;
    }
}

?>
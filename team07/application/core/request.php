<?php

/**
 * Created by PhpStorm.
 * User: login
 * Date: 11/13/16
 * Time: 3:10 PM
 * INSPIRED BY panique/huge
 */

//Request CLASS abstracts access to global super variables
//MIT LICENSE TAKEN FROM PANQIUE/Huge
class Request
{

    public static function post($key, $clean = false)
    {
        if(isset($_POST[$key])){
            return ($clean) ? trim(strip_tags($_POST[$key])) : $_POST[$key];
        }
        return null;
    }

    public static function postCheckbox($key)
    {
        return isset($_POST[$key]) ? 1 : NULL;
    }

    public static function get($key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
        return null;
    }

    public static function cookie($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }
}

?>
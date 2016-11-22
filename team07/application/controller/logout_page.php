<?php

/**
 * Created by PhpStorm.
 * User: lijie
 * Date: 11/21/16
 * Time: 4:51 PM
 */
class logout_page extends Controller
{
    public function logoutRegisteredUser(){

        session_destroy();
        $_SESSION['logged_in'] = false;


    }
}
<?php

class logout_page extends Controller
{
/**
 * Created by PhpStorm.
 * User: lijie
 * Date: 11/21/16
 * Time: 4:51 PM
 */

    public function index()
    {
    // load views
    require APP . 'view/_templates/header.php';
    require APP . 'view/logout_page/index.php';
    require APP . 'view/_templates/footer.php';
        public function logoutRegisteredUser()
    {
        if(isset($_SESSION['logged_in'])) {
            ini_set('display_errors',1);
            error_reporting(E_ALL);
            session_start();
            session_unset($_SESSION['logged_in']);
            session_destroy();
            header('location: ' . URL . 'proto/index');
            exit();

        }

    }


    }

    
}
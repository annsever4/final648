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
    }

    public function logoutRegisteredUser()
    {

        session_destroy();

        $_SESSION['logged_in'] = false;


    }
}
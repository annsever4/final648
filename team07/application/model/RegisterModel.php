<?php

/**
 * Created by PhpStorm.
 * User: euphoric
 * Date: 11/11/16
 * Time: 12:30 PM
 */
class RegisterModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}

?>
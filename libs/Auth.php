<?php
/**
 * 
 */
class Auth
{
    
    public static function autentica($permission)
    {
        @session_start();
        $logged = $_SESSION['nivel'];
        if ($logged == false) {
            session_destroy();
            header('Location: login/');
            exit;
        }
    }

    public static function teste()
    {
        @session_start();
        if ($_SESSION['nivel'] != 1) {
            session_destroy();
            header('Location: login/');
            exit;
        }
    }
    
}
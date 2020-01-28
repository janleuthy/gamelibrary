<?php


namespace App\Controller;


class SessionCheck
{
    // Session Check mit [count] und [user]
    public static function CheckSession() {
        session_start();
        if(isset($_SESSION["count"])) {
            return $_SESSION["user"];
        }
        else
            return null;
    }
}
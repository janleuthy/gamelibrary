<?php


namespace App\Controller;


class SessionCheck
{
    public static function CheckSession() {
        session_start();
        if(isset($_SESSION["count"]))
            return $_SESSION["user"];
        else
            return "";
    }
}
<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\GameRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function create()
    {
        // Hier wird Benutzer erstellt
        $login = SessionCheck::CheckSession();

        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->username = "";
        $view->display(0);
    }

    public function doCreate()
    {
        // User erstellen
        $response;
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $response = $userRepository->create($firstName, $lastName, $email, $username, $password);
        }
        if($response == null){
            header('Location: /user/create');
        }
        else{
            header('Location: /game');
        }
    }

    public function doLogin() {
        // Einloggen
        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->login($username, $password);

            if (SessionCheck::CheckSession()){
                header('Location: /game');
            }
            else {
                header('Location: /user/login');
            }
        }
    }

    public function doEdit() {
        // Bearbeiten des Users
        $login = SessionCheck::CheckSession();
        if ($login) {
            if (isset($_POST['post'])) {
                $firstName = $_POST['fname'];
                $lastName = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $repository = new UserRepository();
                $repository->editEntry($firstName, $lastName, $email, $password, $login["id"]);
            }
            header('Location: /user/profile');
        }
        else {
            header('Location: /user/login');
        }
    }

    public function doLogout() {
        // Logout
        session_start();
        session_destroy();
        unset($_SESSION["count"]);
        unset($_SESSION["username"]);
        unset($_SESSION["id"]);
        header('Location: /');
    }

    public function login() {
        // Login
        $login = SessionCheck::CheckSession();
        if (!isset($login["id"]))
        {
            $view = new View('user/login');
            $view->title = 'Anmelden';
            $view->heading = 'Anmelden';
            $view->username = "";
            $view->display(0);
        }
        else {
            header('Location: /user/dologout');
        }
    }

    public function edit()
    {
        // User editieren
        $login = SessionCheck::CheckSession();
        if (isset($login["id"])) {
            $view = new View('user/edit');
            $view->title = 'Benutzer bearbeiten';
            $view->heading = 'Benutzer bearbeiten';

            $userRepository = new UserRepository();
            $view->user = $userRepository->readById($login["id"]);

            $view->username = $login["username"];
            $view->display($login["id"]);
        }
        else {
            header('location: /user/login');
        }
    }

    public function profile()
    {
        // Profil Anzeige
        $login = SessionCheck::CheckSession();
        if (isset($login["id"])) {
            $view = new View('user/profile');
            $view->heading = 'Profil';
            $view->title = "Profil";

            $userRepository = new UserRepository();
            $view->user = $userRepository->readById($login["id"]);

            $view->username = $login["username"];
            $view->display($login["id"]);
        }
        else {
            header('location: /user/login');
        }
    }

    public function delete()
    {
        // Löschen
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}

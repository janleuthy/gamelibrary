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
    public function index()
    {
        $userRepository = new UserRepository();
        $gamesRepository = new GameRepository();

        $login = SessionCheck::CheckSession();

        $view = new View('user/index');

        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->username = $login["username"];
        $view->display($login["id"]);
    }

    public function create()
    {
        $login = SessionCheck::CheckSession();

        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->username = "";
        $view->display(0);
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $username, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function doLogin() {
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

    public function doLogout() {
        session_start();
        session_destroy();
        unset($_SESSION["count"]);
        unset($_SESSION["username"]);
        unset($_SESSION["id"]);
        header('Location: /');
    }

    public function login() {
        $login = SessionCheck::CheckSession();
        if (!$login)
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
        $login = SessionCheck::CheckSession();
        if ($login) {
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
        $login = SessionCheck::CheckSession();
        if ($login) {
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
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}

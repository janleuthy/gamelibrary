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
        $view->username = $login;
        $view->display($login);
    }

    public function create()
    {
        $login = SessionCheck::CheckSession();

        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->username = $login;
        $view->display($login);
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
                //print_r($_SESSION);
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
        unset($_SESSION["user"]);
        header('Location: /');
    }

    public function login() {
        $login = SessionCheck::CheckSession();

        $view = new View('user/login');
        $view->title = 'Anmelden';
        $view->heading = 'Anmelden';
        $view->username = $login;
        $view->display($login);
    }

    public function edit()
    {
        $login = SessionCheck::CheckSession();
        if ($login != "") {
        $view = new View('user/edit');
        $view->title = 'Benutzer bearbeiten';
        $view->heading = 'Benutzer bearbeiten';
        $view->username = $login;
        $view->display($login);
        }
        else {
            header('location: /user/login');
        }
    }

    public function profile()
    {
        $login = SessionCheck::CheckSession();
        if ($login != "") {
            $view = new View('user/profile');
            $view->title = 'Profil';
            $view->heading = 'Profil';
            $view->username = $login;
            $view->display($login);
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

<?php


namespace App\Controller;


use App\Repository\GameRepository;
use App\View\View;

class GameController
{
    public function index() {
        $login = SessionCheck::CheckSession();

        $view = new View('/game/index');
        $view->title = 'Ihre Spiele';
        $view->heading = 'Spiele';
        $view->display($login);
    }
    public function create()
    {
        $login = SessionCheck::CheckSession();

        $view = new View('game/create');
        $view->title = 'Neues Game';
        $view->heading = 'Spiel hinzufügen';
        $view->display($login);
    }
    public function edit(){
        $login = SessionCheck::CheckSession();

        $view = new View('game/edit');
        $view->title = 'Spiel bearbeiten';
        $view->heading = 'Spiel bearbeiten';
        $view->display($login);

    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $beschreibung = $_POST['beschreibung'];

            $gamesRepository = new GameRepository();
            $gamesRepository->create($name, $beschreibung);

        }

        header('Location: /game');
    }

}
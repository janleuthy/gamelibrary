<?php


namespace App\Controller;


use App\Repository\GameRepository;
use App\View\View;

class GameController
{
    public function index() {
        $view = new View('/game/all');
        $view->title = 'Ihre Spiele';
        $view->heading = 'Spiele';
        $view->display();
    }
    public function create()
    {
        $view = new View('game/create');
        $view->title = 'Neues Game';
        $view->heading = 'Spiel hinzufügen';
        $view->display();
    }
    public function edit(){
        $view = new View('game/edit');
        $view->title = 'Spiel bearbeiten';
        $view->heading = 'Spiel bearbeiten';
        $view->display();

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
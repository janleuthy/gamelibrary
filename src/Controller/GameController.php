<?php


namespace App\Controller;


use App\Repository\GameRepository;
use App\Repository\Repository;
use App\View\View;

class GameController
{
    public function index() {
        $login = SessionCheck::CheckSession();
        if (isset($login["id"])) {
            $gameRepository = new GameRepository();
            $view = new View('/game/index');
            $view->title = 'Ihre Spiele';
            $view->heading = 'Spiele';

            $view->username = $login["username"];
            $view->games = $gameRepository->readAllByUserId($login["id"]);
            $view->display($login["id"]);
        }
        else {
            header('Location: /user/login');
        }
    }
    public function create()
    {
        $login = SessionCheck::CheckSession();
        if (isset($login["id"])) {
            $view = new View('game/create');
            $view->title = 'Neues Game';
            $view->heading = 'Spiel hinzufügen';
            $view->username = $login["username"];
            $view->display($login["id"]);
        }
        else {
            header('Location: /user/login');
        }
    }
    public function edit(){
        $login = SessionCheck::CheckSession();
        if (isset($login["id"])) {
            $view = new View('game/edit');
            $view->title = 'Spiel bearbeiten';
            $view->heading = 'Spiel bearbeiten';

            $gameRepository = new GameRepository();
            $view->game = $gameRepository->readById($_GET["id"]);

            $view->username = $login["username"];
            $view->display($login["id"]);
        }
        else {
            header('Location: /user/login');
        }
    }
    public function doCreate()
    {
        $login = SessionCheck::CheckSession();
        if ($login) {
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $beschreibung = $_POST['beschreibung'];

            $gamesRepository = new GameRepository();
            $gamesRepository->create($name, $beschreibung, $login["id"]);
        }
        else {
            header('Location: /templates/error.php');
        }
        }

        header('Location: /game');
    }

    public function doEdit() {
        $login = SessionCheck::CheckSession();
        if ($login) {
            if (isset($_POST['send'])) {
                $nameedit = $_POST['gamename'];
                $descriptionedit = $_POST['gametext'];
                $gameid = $_POST['gameid'];
                $repository = new GameRepository();
                $repository->editEntry($nameedit, $descriptionedit, $gameid);

            }

            header('Location: /game');
        }
        else{
            header('Location: /user/login');
        }
    }

    public function deleteCard() {
        $repository = new GameRepository();
        $repository->deleteById($_GET["id"]);
        header('Location: /game');
    }
}

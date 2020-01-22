<?php


namespace App\Controller;


use App\View\View;

class SpieleController
{
    public function all() {
        $view = new View('/spiele/all');
        $view->title = 'Ihre Spiele';
        $view->heading = 'Spiele';
        $view->display();
    }

    public  function  new() {
        $view = new View('/spiele/new');
        $view->title = 'Neues Spiel';
        $view->heading = 'Neues Spiel erfassen';
        $view->display();
    }
}

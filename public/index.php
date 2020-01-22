<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Dispatcher\Dispatcher;
use App\Exception\ExceptionListener;

ExceptionListener::register();
Dispatcher::dispatch();

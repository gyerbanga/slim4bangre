<?php
 error_reporting(E_ALL);
ini_set("display_errors", 1);


use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);
};
<?php

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Slim\App;

return function (App $app) {
    $app->get('/', function (ServerRequest $request, Response $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });
};

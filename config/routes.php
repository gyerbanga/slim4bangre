<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);
    $app->get('/users/{id}', \App\Action\UserReadAction::class);
    $app->post('/users', \App\Action\UserCreateAction::class);
    $app->get('/hello/{name}', \App\Action\Hello\HelloAction::class)->setName('hello');
    $app->get('/site', \App\Action\Home\HomeAction::class)->setName('root');
    $app->put('/books/:id', function ($id) {
/*    	<form action="/books/1" method="post">
    ... other form fields here...
    <input type="hidden" name="_METHOD" value="PUT"/>
    <input type="submit" value="Update Book"/>
</form>*/

});
};



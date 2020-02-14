<?php

namespace App\Action;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Service\UserCreator;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class UserCreateAction
{
    private $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
/*        $html = <<<HTML
<html>
    <form method="POST">
        <label>Name: <input name="name"></label>
        <label>Country: <input name="country"></label>
        <input type="submit">
    </form>
</html>
HTML;
    $response->getBody()->write($html);
    return $response;
    */

        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Mapping (should be done in a mapper class)
        $user = new UserCreateData();
        $user->nom = $data['nom'];
        $user->prenom = $data['prenom'];
       // $user->date_cree = $data['last_name'];
        $user->email = $data['email'];

        // Invoke the Domain with inputs and retain the result
        $id_tech = $this->userCreator->createUser($user);

        // Transform the result into the JSON representation
        $result = [
            'id_tech' => $id_tech
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(201);
    }
}
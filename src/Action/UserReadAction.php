<?php

namespace App\Action;

use App\Domain\User\Service\UserReader;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class UserReadAction
{
    private $userReader;

    public function __construct(UserReader $userReader)
    {
        $this->userReader = $userReader;
    }

    public function __invoke(ServerRequest $request, Response $response, array $args = []): Response
    {
        // Collect input from the HTTP request
        $id_tech = (int)$args['id'];

        // Invoke the Domain with inputs and retain the result
        $userData = $this->userReader->getUserDetails($id_tech);

        // Transform the result into the JSON representation
        $result = [
            'id_tech' => $userData->id,
            'nom' => $userData->nom,
            'prenom' => $userData->prenom,
           // 'last_name' => $userData->lastName,
            'email' => $userData->email,
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(200);
    }
}
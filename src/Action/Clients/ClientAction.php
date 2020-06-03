<?php


namespace App\Action\Clients;


use App\Domain\Clients\Service\ListClient;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ClientAction
{
    private ListClient $listClient;
    public function __construct(ListClient $listClient)
    {
        $this->listClient = $listClient;
    }
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = ['clients' => $this->listClient->list()];
        return $response->withJson($data, 200);
    }
}

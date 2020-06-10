<?php


namespace App\Action\Clients;


use App\Domain\Clients\Service\UpdateClient;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ClientUpdateAction
{
    private UpdateClient $service;
    public function __construct(UpdateClient $service)
    {
        $this->service = $service;
    }
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        var_dump($data);
        $r = $this->service->updateClient($data);
        if ($r['error']):
            return $response->withJson($r, 400);
        endif;
        return $response->withJson($r, 200);
    }
}
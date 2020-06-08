<?php


namespace App\Action\Clients;


use App\Domain\Clients\Service\CreatorClient;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ClientCreateAction
{
    private $clientCreator;

    public function __construct(CreatorClient $clientCreator)
    {
        $this->clientCreator = $clientCreator;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();
        $uploadedFiles = $request->getUploadedFiles()['image'];
        if (!empty($uploadedFiles)) {
            $data['image'] = $uploadedFiles;
        }
        $client = $this->clientCreator->createClient($data);
        if ($client['error']) {
            $result = [$client];
            return $response->withJson($result, 400);
        }
        $result = [$client];
        return $response->withJson($result, 201);
    }
}
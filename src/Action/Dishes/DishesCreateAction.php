<?php


namespace App\Action\Dishes;


use Slim\Http\Response;
use Slim\Http\ServerRequest;
use App\Domain\Dishes\Service\CreatorDishes;

class DishesCreateAction
{
    private CreatorDishes $service;
    public function __construct(CreatorDishes $service)
    {
        $this->service = $service;
    }
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();
        $image = $request->getUploadedFiles()['image'];
        if (!empty($image)) {
            $data['image'] = $image;
        }
        $dishes = $this->service->creatorDishes($data);
        if ($dishes['error']){
            $result = [$dishes];
            return $response->withJson($result, 400);
        }
        $result = [$dishes];
        return $response->withJson($result, 201);
    }
}
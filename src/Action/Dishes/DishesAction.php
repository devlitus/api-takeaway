<?php


namespace App\Action\Dishes;


use App\Domain\Dishes\Service\ListDishes;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class DishesAction
{
    private ListDishes $listDishes;
    public function __construct(ListDishes $listDishes)
    {
        $this->listDishes = $listDishes;
    }
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = ['dishes' => $this->listDishes->dishesService()];
        return $response->withJson($data, 200);
    }
}
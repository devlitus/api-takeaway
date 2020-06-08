<?php


namespace App\Action\Categories;


use App\Domain\Categories\Service\ListCategory;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class CategoryAction
{
    private ListCategory $category;
    public function __construct(ListCategory $category)
    {
        $this->category = $category;
    }
    public function __invoke(ServerRequest $request, Response $response): Response
    {
         $data = ['category' => $this->category->listCategory()];
         return $response->withJson($data, 200);
    }
}
<?php


namespace App\Action\Categories;


use App\Domain\Categories\Service\CreateCategory;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class CategoryCreateAction
{
    /**
     * @var CreateCategory
     */
    private CreateCategory $service;

    /**
     * CategoryCreateAction constructor.
     * @param CreateCategory $service
     */
    public function __construct(CreateCategory $service)
    {
        $this->service = $service;
    }

    /**
     * @param ServerRequest $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $r = $this->service->categoryCreator($data);
        if ($r['error']):
            return $response->withJson($r, 400);
        endif;
        return $response->withJson($r, 201);
    }
}
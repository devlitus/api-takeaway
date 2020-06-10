<?php


use App\Action\Categories\CategoryAction;
use App\Action\Categories\CategoryCreateAction;
use App\Action\Clients\ClientAction;
use App\Action\Clients\ClientCreateAction;
use App\Action\Clients\ClientUpdateAction;
use App\Action\Dishes\DishesAction;
use App\Action\Dishes\DishesCreateAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/v1', function (RouteCollectorProxy $group) {
        $group->group('/users', function (RouteCollectorProxy $group){
            $group->get('/list', ClientAction::class);
            $group->post('/create', ClientCreateAction::class);
            $group->put('/update', ClientUpdateAction::class);
        });
        $group->group('/categories', function (RouteCollectorProxy $group){
            $group->get('/list', CategoryAction::class);
            $group->post('/create', CategoryCreateAction::class);
        });
        $group->group('/dishes', function (RouteCollectorProxy $group){
            $group->get('/list', DishesAction::class);
            $group->post('/create', DishesCreateAction::class);
        });
    });

};

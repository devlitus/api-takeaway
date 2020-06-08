<?php


use App\Action\Categories\CategoryAction;
use App\Action\Clients\ClientAction;
use App\Action\Clients\ClientCreateAction;
use App\Action\Dishes\DishesAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/v1', function (RouteCollectorProxy $group) {
        $group->get('/users', ClientAction::class);
        $group->post('/create', ClientCreateAction::class);
        $group->get('/category', CategoryAction::class);
        $group->get('/dishes', DishesAction::class);
    });

};

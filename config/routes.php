<?php


use App\Action\Clients\ClientAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/v1', function (RouteCollectorProxy $group) {
        $group->get('/users', ClientAction::class);
    });

};

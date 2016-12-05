<?php
namespace Comments;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$container = new \Slim\Container;

$container['settings']['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'comments',
    'username' => 'comments',
    'password' => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$container['settings']['displayErrorDetails'] = true;
$container['settings']['addContentLengthHeader'] = false;

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['view'] = new \Slim\Views\PhpRenderer("../views/");

$app = new \Slim\App($container);

$app->get('/comments', 'App\Controllers\Comments:index');

$app->post('/comments', function (Request $request, Response $response) {
    return $response;
});

$app->run();
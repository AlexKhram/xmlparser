<?php
ini_set('display_errors', 0);

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/config.php';

$app = new Silex\Application();

$app['debug'] = false;

// service providers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/app/src/Alex/View',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $dbParams
));

// models
$app['modelUser'] = new Alex\Model\User($app);
$app['modelPay'] = new Alex\Model\Pay($app);

// routing
$app->get('/', "Alex\\Controller\\PayController::index");
$app->get('/parse', "Alex\\Controller\\PayController::parseData");
$app->get('/get', "Alex\\Controller\\PayController::getData");

// errors handling
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    switch ($code) {
        case 404:
            return new Response('Page not faund', 404);
        default:
            return new Response('Something went wrong', 500);
    }
});

$app->run();


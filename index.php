<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\UserController;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    echo "Bienvenu sur l'accueil";
}, 'home');

$router->map('GET', '/users', function () {
    $userController = new UserController();
    echo $userController->findAll();
}, 'users_list');

$router->map('GET', '/users/[i:id]', function ($id) {
    echo ("Bienvenu sur la page de l’utilisateur " . $id);
}, 'user/id');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
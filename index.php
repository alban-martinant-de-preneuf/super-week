<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

use App\Controller\UserController;
use App\Controller\AuthController;
use App\Controller\BookController;

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
    $userController = new UserController();
    $userController->getUserInfos($id);
}, 'user_id');

$router->map('GET', '/register', function () {
    $authController = new AuthController();
    $authController->displayRegister();
}, 'user_register');

$router->map('POST', '/register', function () {
    if (isset($_POST['submit'])) {
        $authController = new AuthController();
        $authController->register(
            $_POST['email'],
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['password'],
            $_POST['passwordConf']
        );
    }
}, 'user_register_post');

$router->map('GET', '/login', function () {
    $authController = new AuthController();
    $authController->displayLogin();
}, 'user_login');

$router->map('POST', '/login', function () {
    if (isset($_POST['submit'])) {
        $authController = new AuthController();
        $authController->login(
            $_POST['email'],
            $_POST['password']
        );
    }
    echo "ok";
    var_dump($_SESSION);
}, 'user_login_post');

$router->map('GET', '/books/write', function () {
    $bookController = new BookController();
    $bookController->displayAddBook();
}, 'book_write');

$router->map('POST', '/books/write', function () {
    if (isset($_POST['submit']) && isset($_SESSION['user'])) {
        $bookController = new BookController();
        $bookController->addBook(
            $_POST['title'],
            $_POST['content'],
            $_SESSION['user']['id']
        );
    }
}, 'book_post');

$router->map('GET', '/books', function () {
    $bookController = new BookController();
    $bookController->getBooks();
}, 'get_books');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

use App\Controller\UserController;
use App\Controller\AuthController;
use App\Controller\BookController;
use App\Controller\HomeController;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    $homeController = new HomeController;
    $homeController->displayHome();
}, 'home');

$router->map('GET', '/faker/books', function () {
    $faker = Faker\Factory::create('fr_FR');
    $bookController = new BookController();
    $bookController->createItems($faker);
}, 'faker_books');

$router->map('GET', '/faker/users', function () {
    $faker = Faker\Factory::create('fr_FR');
    $userController = new UserController();
    $userController->createItems($faker);
}, 'faker_users');

$router->map('GET', '/users/delete', function () {
    $userController = new UserController();
    $userController->delAll();
}, 'delete_users');

$router->map('GET', '/books/delete', function () {
    $bookController = new BookController();
    $bookController->delAll();
}, 'delete_books');

$router->map('GET', '/users', function () {
    $userController = new UserController();
    $userController->getAll();
}, 'users_list');

$router->map('GET', '/users/[i:id]', function ($id) {
    $userController = new UserController();
    $userController->getInfos($id);
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
}, 'user_login_post');

$router->map('GET', '/books/write', function () {
    $bookController = new BookController();
    $bookController->displayRegisterForm();
}, 'book_write');

$router->map('POST', '/books/write', function () {
    if (isset($_POST['submit']) && isset($_SESSION['user'])) {
        $bookController = new BookController();
        $bookController->register([
            "title" => $_POST['title'],
            "content" => $_POST['content'],
            "id_user" => $_SESSION['user']['id']
        ]);
    }
}, 'book_post');

$router->map('GET', '/books', function () {
    $bookController = new BookController();
    $bookController->getAll();
}, 'get_books');

$router->map('GET', '/books/[i:id]', function ($id) {
    $bookController = new BookController();
    $bookController->getInfos($id);
}, 'get_book_infos');

$router->map('GET', '/logout', function () {
    session_destroy();
    header('Location: /super-week');
}, 'logout');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

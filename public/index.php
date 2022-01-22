<?php
    session_start();
    $request = $_SERVER['REQUEST_URI'];

    require_once(dirname(__DIR__,1) . "/vendor/autoload.php");
    use app\core\Application;
    $app = new Application(dirname(__DIR__));

    $app->router->get('/',"home");

    $app->router->get("/register", "register");
    $app->router->get("/registered", "registered");

    $app->router->get("/login", "login");
    $app->router->get("loggedIn", "loggedIn");

    $app->run();
?>
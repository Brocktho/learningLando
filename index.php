<?php
    session_start();
    $request = $_SERVER['REQUEST_URI'];

    function routePages(){
        $request = $_SERVER['REQUEST_URI'];

        switch ($request) {
            case "/login" :
                require __DIR__ . "/public/login.php";
                break;
            case "/register" :
                require __DIR__ . "/public/register.php";
                break;
            case "/" :
                require __DIR__ . "/public/home.php";
                break;
            case " " :
                require __DIR__ . "/public/home.php";
                break;
            case "/home" :
                require __DIR__ . "/public/home.php";
                break;
            case "/users" :
                require __DIR__ . "/public/viewUsers.php";
                break;
            default :
                http_response_code(404);
                require __DIR__ . "/public/404.php";
                break;
        };
    };
    routePages();
?>
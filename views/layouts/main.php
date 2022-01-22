<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome Home Bro</title>
        <meta name="description" content="A basic application to get familiar with PHP and Lando">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            "
            {{styles}}
            "
        </style>      
    </head>
    <body class="flexCol full space-around">
        <header>
            <navigation class="navbar">
                <ul class="flexRow noDecoration linkList">
                    <li><a href="/" class="noDecoration linkText">Home</a></li>
                    <li><a href="/register" class="noDecoration linkText">Register</a></li>
                    <li><a href="/login" class="noDecoration linkText">Login</a></li>
                    <li><a href="/users" class="noDecoration linkText">See Users</a></li>
                </ul>
            </navigation>
        </header>
        <section>
        {{content}}
        </section>
        <footer>
        This is a footer
        </footer>
    </body>
</html>
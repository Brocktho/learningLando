<?php
namespace app\core;
class Router{
    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function resolve(){
        $path = Application::$app->request->getPath();
        $method = Application::$app->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback){
            Application::$app->response->setStatusCode(404);
            return "<style>
            .oops{
                display: flex;
                flex-direction: column;
                width: 100vw;
                height: 100vh;
                background: gray;
                align-items: center;
            }
            .text{
                color: silver;
            }
            .return{
                width: 30vw;
                height: 5vh;
                background-color: red;
                text-decoration: none;
                color: black;
                border-radius: .5rem;
                text-align: center;
                padding-top: 1.5rem;
            }
            .return:hover{
                transform: scale(1.1);
                background-color: silver;
                color: red;
                text-decoration: underline;
            }
            </style><body class='oops'><h1 class='text'>Oops, Looks like this page doesn't exist...</h1><br><a href='/' class='return noDecoration linkText'>Return To Site</a></body>";
        }if (is_string($callback)){
            Application::$app->response->setStatusCode(200);
            return $this->renderView($callback);
        }else{
            return call_user_func($callback);
        }
    }

    public function renderView($view){
        $layoutContent = $this->layoutContent();
        $styleContent = $this->layoutStyles();
        $styledLayout = str_replace("{{styles}}", $styleContent, $layoutContent);
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $styledLayout);
    }

    protected function layoutContent(){
        #starts buffer
        ob_start();
        include_once(Application::$ROOT_DIR ."/views/layouts/main.php");
        #clears buffer while giving us the layout text without outputting directly
        return ob_get_clean();
    }

    protected function layoutStyles(){
        ob_start();
        include_once(Application::$ROOT_DIR . "/styles/styles.css");
        return ob_get_clean();
    }

    protected function renderOnlyView($view){
        ob_start();
        include_once(Application::$ROOT_DIR . "/views/$view.php");
        return ob_get_clean();
    }
}
?>
<?php
namespace app\core;
class Application {
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;

    public static Application $app;

    public function __construct($root){
        self::$ROOT_DIR = $root;
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router();
    }
    public function run(){
        echo $this->router->resolve();
    }
}
?>
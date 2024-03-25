<?php

namespace App\Core;

class Router{

    protected static $routes = [];

    public static function get(string $url,array $target){
        Router::$routes['get'][$url]['target'] = $target;
    }

    public static function post(string $url,array $target){
        Router::$routes['post'][$url]['target'] = $target;
    }

    public static function delete(string $url,array $target){
        Router::$routes['delete'][$url]['target'] = $target;
    }

    public static function dispatch(){

        $method = Router::getMethod();
        $url    = Router::getUri();
        $data = json_decode(file_get_contents("php://input"),true);

        if ($method === "OPTIONS") {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, DELETE');
            header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
            header("Access-Control-Max-Age: 3600");
            http_response_code(200);
            exit();
        }

        if(!isset(Router::$routes[$method][$url]['target'])){
            http_response_code(404);
            throw new Exception('Route not found');
        }

        call_user_func(Router::$routes[$method][$url]['target'],$data);
        exit();
    }

    private static function getMethod(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "GET"){
            return 'get';
        }

        if($method == "POST"){
            return 'post';
        }

        if($method == "DELETE"){
            return 'delete';
        }

        if($method == "OPTIONS"){
            return 'OPTIONS';
        }
        throw new Exception('Route not found');
    }

    private static function getUri(){
        return $_SERVER['PATH_INFO'];
    }

}

?>
<?php

namespace App\Core;

abstract class BaseController{

    protected function response(array $data , $status_code=200){

        header("Content-type: json");
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, DELETE');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        http_response_code($status_code);
        echo json_encode($data);
        exit();
    }

}

?>
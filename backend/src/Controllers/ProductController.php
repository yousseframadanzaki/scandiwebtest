<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Factories\ProductFactory;
use App\Factories\ProductValidatorFactory;
use App\Models\Product;

class ProductController extends BaseController{

    public function create($request){
        $errors = ProductValidatorFactory::create($request)->validate();
        if(!empty($errors)){
            return $this->response(array("status" => "error","msg" => $errors),400);
        }

        if(!ProductFactory::create($request)->save()){
            return $this->response(array("status" => "error","msg" => "server error"),500);
        }
        
        return $this->response(array("status" => "success","msg" => "product created successfully"),201);
    }

    public function all(){
        $products = ProductFactory::create_list((new Product)->get_all());
        return $this->response(array("status"=>"success","msg"=>"","data"=>$products),200);
    }

    public function delete($request){
        $rowCount = (new Product)->delete_in($request['ids']);
        return $this->response(array("status"=>"success","msg"=>"products deleted successfully","rowCount"=>$rowCount),200);
    }
    
}

?>

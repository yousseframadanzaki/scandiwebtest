<?php

namespace App\Models;

use App\Core\BaseModel;

class Product extends BaseModel{

    private $products_list;

    public function __construct(){
        parent::__construct("products");
    }

    public function toArray(){
        return;
    }

    public function fromArray($data){
        return;
    }

}

?>
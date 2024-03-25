<?php

namespace App\Models;

use App\Core\BaseModel;

abstract class BaseProduct extends BaseModel{

    private $id;
    private $sku;
    private $name;
    private $price;
    private $type;

    public function __construct() {
        parent::__construct("products");
    }

    public function fromArray($data){
        $this->id    = $data['id'] ?? "";
        $this->sku   = $data['sku'];
        $this->name  = $data['name'];
        $this->price = $data['price'];
        $this->type  = $data['type'];
    }

    public function toArray(){
        if(!empty($this->id)){
            return array(
                "id"    => $this->id,
                "sku"   => $this->sku,
                "name"  => $this->name,
                "price" => $this->price,
                "type"  => $this->type
            );
        }
        return array(
            "sku"   => $this->sku,
            "name"  => $this->name,
            "price" => $this->price,
            "type"  => $this->type
        );
    }

}



?>
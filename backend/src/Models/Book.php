<?php

namespace App\Models;

use App\Core\BaseModel;

class Book extends BaseProduct{

    private $size;

    public function fromArray($data){
        parent::fromArray($data);
        $this->weight   = $data['weight'];
    }

    public function toArray(){
        return array_merge(parent::toArray(),["weight"   => $this->weight]);
    }

}

?>
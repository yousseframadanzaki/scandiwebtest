<?php

namespace App\Models;

use App\Core\BaseModel;

class Dvd extends BaseProduct{

    private $size;

    public function fromArray($data){
        parent::fromArray($data);
        $this->size   = $data['size'];
    }

    public function toArray(){
        return array_merge(parent::toArray(),["size"   => $this->size]);
    }

}



?>
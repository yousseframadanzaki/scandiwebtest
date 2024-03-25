<?php

namespace App\Models;

use App\Core\BaseModel;

class Furniture extends BaseProduct{

    private $width;
    private $height;
    private $length;

    public function fromArray($data){
        parent::fromArray($data);
        $this->width   = $data['width'];
        $this->height   = $data['height'];
        $this->length   = $data['length'];
    }

    public function toArray(){
        return array_merge(parent::toArray(),[
            "width"   => $this->width,
            "height"   => $this->height,
            "length"   => $this->length
        ]);
    }

}



?>
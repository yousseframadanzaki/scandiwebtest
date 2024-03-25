<?php

namespace App\Factories;

use App\Validation\DvdValidator;
use App\Validation\BookValidator;
use App\Validation\FurnitureValidator;
use App\Validation\ProductValidator;
use Exception;
class ProductValidatorFactory{

    protected static $ProductValidationMapping = [
        'dvd'       => DvdValidator::class,
        'book'      => BookValidator::class,
        'furniture' => FurnitureValidator::class,
    ];

    public  static function create($data){
        if( isset($data['type'])
            && is_string($data['type'])
            && array_key_exists($data['type'],self::$ProductValidationMapping)
        ){
            $product_validator = new self::$ProductValidationMapping[$data['type']]($data);
            return $product_validator;
        }
        $product_validator = new ProductValidator($data);
        return $product_validator;
    }

}

?>
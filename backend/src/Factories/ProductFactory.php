<?php

namespace App\Factories;

use App\Models\Dvd;
use App\Models\Book;
use App\Models\Furniture;
use Exception;
class ProductFactory{

    private static $ProductMapping = [
        'dvd'       => Dvd::class,
        'book'      => Book::class,
        'furniture' => Furniture::class,
    ];

    public  static function create($data){
        $product = new self::$ProductMapping[$data['type']];
        $product->fromArray($data);
        return $product;
    }

    public  static function create_list($products)
    {
        $list = [];
        foreach ($products as $product) {
            $list[] = (self::create($product))->toArray();
        }
        return $list;
    }

}

?>
<?php
namespace App\Validation;

use App\Core\BaseValidator;

abstract class BaseProductValidator extends BaseValidator{
    
    protected function rules()
    {
        return [
            'sku'   => 'required|alphanumeric|min:6|max:24|unique:products,sku',
            'name'  => 'required|min:6|max:24',
            'price' => 'required|number',
            'type'  => 'required|enum:dvd,book,furniture'
        ];
    }

    protected function messages()
    {
        return [

        ];
    }

}



?>
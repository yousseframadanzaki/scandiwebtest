<?php
namespace App\Validation;

use App\Core\BaseValidator;

class ProductValidator extends BaseProductValidator{

    public function __construct($data) {
        $this->data = $data;
    }

    protected function rules()
    {
        return parent::rules();
    }

    protected function messages()
    {
        return [
            'enum' => 'The %s must be in (%s,%s,%s)',
        ];
    }

}



?>
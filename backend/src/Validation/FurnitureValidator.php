<?php
namespace App\Validation;

class FurnitureValidator extends BaseProductValidator{

    public function __construct($data) {
        $this->data = $data;
    }

    protected function rules()
    {
        return array_merge(parent::rules(),[
            'height'   => 'required|number',
            'width'    => 'required|number',
            'length'   => 'required|number',
        ]);
    }

    protected function messages()
    {
        return [

        ];
    }

}



?>
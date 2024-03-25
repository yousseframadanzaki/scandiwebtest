<?php
namespace App\Validation;

class DvdValidator extends BaseProductValidator{

    public function __construct($data) {
        $this->data = $data;
    }

    protected function rules()
    {
        return array_merge(parent::rules(),[
            'size'   => 'required|number',
        ]);
    }

    protected function messages()
    {
        return [

        ];
    }

}



?>
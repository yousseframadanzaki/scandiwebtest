<?php
namespace App\Validation;

class BookValidator extends BaseProductValidator{

    public function __construct($data) {
        $this->data = $data;
    }

    protected function rules()
    {
        return array_merge(parent::rules(),[
            'weight'   => 'required|number',
        ]);
    }

    protected function messages()
    {
        return [

        ];
    }

}



?>
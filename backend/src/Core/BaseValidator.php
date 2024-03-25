<?php

namespace App\Core;

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should only have letters and numbers',
    'number' => 'The %s should be numbers only',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
    'unique' => 'The %s already exists',
    'enum' => 'The %s must be %s',
];

abstract class BaseValidator{

    private $errorBag;
    
    protected $data;
    abstract  protected function rules();
    abstract  protected function messages();
    public function validate(){

        $rules = $this->rules();
        
        foreach ($rules as $field => $field_rules) {
            $this->apply_rules($this->data,$field,$field_rules);
        }

        return $this->errorBag;

    }

    private function apply_rules($data,$field,$field_rules){
        $rules = explode('|',$field_rules);
        $data = isset($data) ? $data : [];
        $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $this->messages());

        foreach ($rules as $rule) {
            $params = [];

            if(strpos($rule,':')){
                [$rule_name, $param_str] = explode(':',$rule);
                $params = explode(',',$param_str);
            }else{
                $rule_name = $rule;
            }

            $fn = 'is_' . $rule_name;
            if(method_exists($this,$fn)){
                $pass = $this->{$fn}($data,$field,...$params);
                
                if(!$pass && !isset($this->errorBag[$field])){
                    $this->errorBag[$field] = sprintf($validation_errors[$rule_name], $field, ...$params);
                }
            }
        }
    }

    private function is_number(array $data,string $field): bool{
        if (array_key_exists($field,$data)) {
            return is_numeric($data[$field]);
        }
        return true;
    }

    private function is_alphanumeric(array $data,string $field){
        if (array_key_exists($field,$data)) {
            return ctype_alnum($data[$field]);
        }
        return true;
    }

    private function is_enum(array $data,string $field,...$values){
        if (array_key_exists($field,$data)) {
            return in_array($data[$field],$values);
        }
        return true;
    }

    private function is_required(array $data,string $field){
        return isset($data[$field]) && !empty($data[$field]);
    }

    private function is_min(array $data,string $field,...$values){
        if(!isset($data[$field])){
            return true;
        }
        $min_length = $values[0];        
        return strlen($data[$field]) >= $min_length;
    }

    private function is_max(array $data,string $field,...$values){
        if(!isset($data[$field])){
            return true;
        }
        $max_length = $values[0];        
        return strlen($data[$field]) <= $max_length;
    }

    private function is_unique(array $data,string $field,...$values){
        if(!isset($data[$field])){
            return true;
        }
        $table = $values[0];
        $coloumn = $values[1];
        $DB = new DataBase("database","scandi", "root", "root");
        $id = $DB->select("SELECT id FROM {$table} WHERE {$coloumn} = '{$data[$field]}'");
        return count($id) === 0;
    }

}

?>
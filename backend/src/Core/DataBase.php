<?php

namespace App\Core;

use PDO;

class DataBase{
	
    private $connection = null;

    public function __construct( $dbhost = "localhost", $dbname = "myDataBaseName", $username = "root", $password    = ""){

        try{
        
            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }			
        
    }
    
    public function insert( $statement = "" , $parameters = [] ){
        try{
            
            $this->execute_statement( $statement , $parameters );
            return $this->connection->lastInsertId();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }

    public function select( $statement = "" , $parameters = [] ){
        try{
            
            $stmt = $this->execute_statement( $statement , $parameters );
            return $stmt->fetchAll();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }
    
    public function query( $statement = "" , $parameters = [] ){
        try{
            
            $stmt = $this->execute_statement( $statement , $parameters );
            return $stmt->rowCount();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }

    private function execute_statement( $statement = "" , $parameters = [] ){
        try{
        
            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }

    public function __destruct(){
        $this->connection = null;
    }
    
}

?>
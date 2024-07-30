<?php

namespace App\helpers;

class DB{

    public static function connect(){
        try {
            $connection = new \PDO('mysql:host=localhost;dbname=teste_umentor', 'root', '');
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\Exception $exception){
            throw new \Exception();
        }
    }
}
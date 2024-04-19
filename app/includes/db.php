<?php

class DB {
    public static function fetch(string $request, array $data, bool $all = false) {
        
        # WITH DOCKER
        $pdo = new PDO('mysql:host=mysql;dbname=webchat', "root", "root");
        
        # WITH LOCAL MYSQL SERVER
        # $pdo = new PDO('mysql:host=127.0.0.1;dbname=webchat', "root", "root");

        $request = $pdo -> prepare($request);
        $request -> execute($data);

        if($all === true) {
            return $request -> fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $request -> fetch(PDO::FETCH_ASSOC);
        } 
    }
}

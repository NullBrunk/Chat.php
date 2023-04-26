<?php

include_once("../includes/db-config.php");
header("Content-type: application/json");
session_start();

// CHECK IF IT IS THE GOOD APIKEY 
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tab = json_decode(file_get_contents('php://input'), true);
    $username = $tab['username'];
    $password = $tab['password'];
    try {
        $request = $pdo -> prepare("INSERT INTO users(username, password) VALUES(:user, :pass)");
        $request -> execute([
            "user" => $username,
            "pass" => $password
        ]);

        $r = $request -> fetch();
    }
    catch(PDOException $e){
        echo('{
            "error": "The given username already exists"
        }');
    }
}

else if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!empty($_GET['npass']) && isset($_GET['npass'])){

        $pass = $_GET['npass'];



        $exists = $pdo -> prepare("SELECT * FROM users WHERE username=:username AND password=:before");
        $exists -> execute([
            "username" => $_SESSION['username'],
            "before" => $_SESSION['password']
        ]);
        $resp = $exists -> fetch();
        
        if(empty($resp)){
            http_response_code(401);
        }
        
        else {
            $request = $pdo -> prepare("UPDATE users SET password=:pass WHERE username=:username");
            $request -> execute([
                "pass" => $pass,
                "username" => $_SESSION['username']
            ]);
            $request -> $fetch;
        
        }
        header("Location: /user/users.php");
    }
}
else {
    echo('{
        "error": "Supported methods: GET, PUT, POST, DELETE"
    }');
}



?>

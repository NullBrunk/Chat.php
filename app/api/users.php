<?php

header("Content-type: application/json");
session_start();


require_once("../includes/db.php");


/**
 * Login a user if he is allowed to 
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    if(!isset($data["user"]) or !isset($data["pass"]) or empty($data["user"]) or empty($data["pass"])){
        echo '{ "resp": false }';
        die();
    }
    
    $r = DB::fetch("SELECT * FROM users WHERE username=:user AND password=:pass", [
        "user" => htmlspecialchars($data['user']),
        "pass" => hash("sha512", $data['pass'])
    ]);

    if (!empty($r)){
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['isadmin'] = $r['isadmin'];
        $_SESSION['logged'] = true;
        echo '{ "resp": true }';
    } else {
        echo '{ "resp": false }';
        die();
    }      
}



/**
 * Sign up a user
 */

else if($_SERVER['REQUEST_METHOD'] === "PUT"){
    
    $data = json_decode(file_get_contents('php://input'), true);
    

    if(!isset($data["user"]) or !isset($data["pass"]) or empty($data['user']) or empty($data['pass'])){
        echo '{ "resp": "strange" }';
        die();
    } 
    if($data["pass"] !== $data["repass"]) {
        echo '{ "resp": "repass" }';
        die();
    }
    

    try {
        DB::fetch("INSERT INTO users(username, password) VALUES(:user, :pass)", [
            "user" => htmlspecialchars($data['user']),
            "pass" => hash("sha512", $data['pass'])
        ]);
    } 
    catch(PDOException $e){
        echo '{ "resp": "already" }';
        die();
    }


    echo '{ "resp": true }';
}



/**
 * Update the user password 
 */
else if($_SERVER['REQUEST_METHOD'] === "PATCH"){
}



/**
 * Delete the account of a user if he is allowed to
 */

else if($_SERVER['REQUEST_METHOD'] === "DELETE") {

}

else {
    echo('{
        "error": "Supported methods: GET, PUT, POST, DELETE"
    }');
}



?>

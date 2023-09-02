<?php

session_start();

require_once("../includes/db.php");


/**
 * Post a message and reload the page
 */

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(isset($_POST['text']) and !empty($_POST['text'])){             
        DB::fetch("INSERT INTO chat(author, msg) VALUES(:author, :msg)", [
            "author" => htmlspecialchars($_SESSION['username']),
            "msg" => htmlspecialchars($_POST['text']),
        ]);     
    }

    echo("<script>window.location.href = '/user/';</script>");
}



/**
 * Delete a message and don't reload the page
 */

else if($_SERVER['REQUEST_METHOD'] === "DELETE"){
    
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        DB::fetch("DELETE FROM chat WHERE id=:id AND author=:author", [
            "id" => $_GET["id"],
            "author" => $_SESSION["username"]
        ]);
    }
}



/**
 * Update a message and don't reload the page
 */

 else if($_SERVER['REQUEST_METHOD'] === "PUT"){
    
    $data = json_decode(file_get_contents('php://input'), true);

    if(isset($data["value"]) && !empty($data["value"]) && isset($data["id"])) {
        DB::fetch("UPDATE chat SET msg=:msg WHERE id=:id AND author=:author", [
            "msg" => htmlspecialchars($data["value"]),
            "id" => $data["id"],
            "author" => $_SESSION["username"],
        ]);
    }
    
}



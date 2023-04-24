<?php

include_once("../includes/db-config.php");
header("Content-type: application/json");


// CHECK IF IT IS THE GOOD APIKEY 
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tab = json_decode(file_get_contents('php://input'), true);
    try {
        $author = htmlspecialchars($tab['author']); 
        $msg = $tab['msg'];
        $icon = htmlspecialchars($tab['icon']); 
    
        $request = $pdo -> prepare("INSERT INTO chat(author, msg, icon) VALUES(:author, :msg, :icon)");
        $request -> execute([
            "author" => $author,
            "msg" => $msg,
            "icon" => $icon,
        ]);
    }
    catch(PDOException $e){
echo("{
\"error\": \"Canno't add the message !\"
}");
    }

}


else if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['user']) && !empty($_GET['password']) && !empty($_GET['id']))
    {
        // Check if the user exists

        $test = $pdo -> prepare("SELECT * FROM users WHERE username=:username AND password=:password ");
        $test -> execute([
            "username" => $_GET['user'],
            "password" => $_GET['password'],
        ]);


        $req = $test -> fetch();
        
        if(empty($req)){
            die();
        }
        else{
            if($req['isadmin'] == '1'){
                $request = $pdo -> prepare("DELETE FROM chat WHERE id=:id");
                $request -> execute([
                    "id" => $_GET['id'],
                ]);
                $req = $request -> fetch();
        
            }
            else {
                $request = $pdo -> prepare("DELETE FROM chat WHERE id=:id AND (author=:username OR author='admin')");
                $request -> execute([
                    "id" => $_GET['id'],
                    "username" => $_GET['user']
                ]);
                $req = $request -> fetch();
        
            }
        }



    }
}

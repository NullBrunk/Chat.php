<?php

include_once("../includes/db-config.php");
session_start();

// CHECK IF IT IS THE GOOD APIKEY 
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['text']) and !empty($_POST['text'])){

        if ($_SESSION['isadmin'] === 1){
            $icon = "chaticon bi bi-person-fill-up";
        }
        else
        {
            $icon = "chaticon bi bi-person-fill";
        }
        
        try {
            
            $author = htmlspecialchars($tab['author']); 
            $msg = $tab['msg']; 
            
            $request = $pdo -> prepare("INSERT INTO chat(author, msg, icon) VALUES(:author, :msg, :icon)");
            
            $request -> execute([
                "author" => htmlspecialchars($_SESSION['username']),
                "msg" => htmlspecialchars($_POST['text']),
                "icon" => $icon,
            ]);
        }
        catch(PDOException $e){
            echo("{
                \"error\": \"Canno't add the message !\"
            }");
        }
        
    }
    echo('<script>window.location.href = "/user/users.php"</script>');
        
    }


else if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['id']))
    {
        
        // Check if the user exists
        $test = $pdo -> prepare("SELECT * FROM users WHERE username=:username AND password=:password ");
        $test -> execute([
            "username" => $_SESSION['username'],
            "password" => $_SESSION['password'],
        ]);


        $req = $test -> fetch();
        
        if(empty($req)){
            die();
        }
        else{
            if($_SESSION['isadmin'] == '1'){
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
                    "username" => $_SESSION['username']
                ]);
                $req = $request -> fetch();
        
            }
        }



    }
    echo('<script>window.location.href = "/user/users.php"</script>');
}

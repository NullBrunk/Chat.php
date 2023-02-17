<?php


require '../includes/db-config.php';
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);

if(isset($_GET['user'])){
    $request = $pdo -> query("SELECT COUNT(*) FROM users;");
    $req = $request->fetch();
    echo($req[0]);
}
else if(isset($_GET['admin'])){
    $request = $pdo -> query("SELECT COUNT(*) FROM users WHERE isadmin=1;");
    $req = $request->fetch();
    echo($req[0]);
}
else if(isset($_GET['chat'])){
    $request = $pdo -> query("SELECT COUNT(*) FROM chat;");
    $req = $request->fetch();
    echo($req[0]);
}

?>
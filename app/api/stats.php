<?php

header("Content-type: application/json");

require_once("../includes/db.php");

echo json_encode([
    DB::fetch("SELECT COUNT(*) as users FROM users", []),
    DB::fetch("SELECT COUNT(*) as admins FROM users WHERE isadmin=1", []),
    DB::fetch("SELECT COUNT(*) as messages FROM chat", []),
]);

?>
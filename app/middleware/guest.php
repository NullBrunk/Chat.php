<?php

# If the user is  connected, redirect it

session_start();

if (isset($_SESSION['logged']) or !empty($_SESSION['logged'])){
	header("Location: /user/");
	//echo("<script>window.location.href = '../user/users.php';</script>"); 
}

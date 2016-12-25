<?php
session_start();
$login = $_POST["login"];
$password = $_POST["password"];

//prihlaseni
if($login == "admin" and $password == "admin"){
    $_SESSION["logged"] = true;
    header("Location: items.php");
}else{
    header("Location: index.html?error=spatneudaje");
}
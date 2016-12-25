<?php
session_start();
include_once "db.inc";
if(isset($_SESSION["logged"]) and $_SESSION["logged"] != true){
    header("Location: index.html?error=spatneudaje");
    die();
}
$id = mysqli_escape_string($connect,strip_tags($_GET["id"]));
$sql = "DELETE FROM `tbl_items` WHERE `id` = ".$id;
//mysqli_query($connect,$sql);
header("Location: items.php");

<?php 
include_once("model/user.php");
$username = $_REQUEST["username"];
echo 'hello world ' . $username;
$user = new user($username,"123", "bpp");
$jsonUser = json_encode($user);
echo $jsonUser;
?>
<?php 
$server = "localhost";
$username= "root";
$password="";
$db = "recipe_website";

$link = new mysqli($server, $username, $password,$db);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
?>
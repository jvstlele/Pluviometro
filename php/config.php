<?php 

$server = "localhost";               //Connessione al database
$user = "root";
$pass = "";
$database = "pluviometro";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
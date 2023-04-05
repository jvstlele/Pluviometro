<?php 

$server = "localhost";               //Connessione al database
$user = "root";
$pass = "";
$database = "pluviometro";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
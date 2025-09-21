<?php
$host="127.0.0.1";
$user="root";
$pw="root";
$db="libri_19";

$conn= new mysqli( $host, $user, $pw, $db);
if( $conn === false)
    die('<br>errore connessione al server: '.$conn->connect_error);

?>
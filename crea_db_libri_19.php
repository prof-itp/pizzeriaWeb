<?php
$host="127.0.0.1";
$user="root";
$pw="root";

$conn= new mysqli( $host, $user, $pw);
if( $conn === false)
    die('<br>errore connessione al server: '.$conn->connect_error);

$sql="CREATE DATABASE IF NOT EXISTS libri_19";
if( $conn->query($sql))
    echo '<br>databse creato';
else echo '<br>errore query: '.$conn->error;

$conn->close();
?>
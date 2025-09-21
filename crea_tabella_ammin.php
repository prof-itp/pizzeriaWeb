<?php
require_once('connetti.php');

$sql="CREATE TABLE IF NOT EXISTS ammin(
        id_ammin INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
if( $conn->query($sql))
    echo '<br>TABLE ammin creata';
else echo '<br>errore query: '.$conn->error;

$conn->close();
?>
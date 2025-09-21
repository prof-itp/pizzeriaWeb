<?php
require_once('connetti.php');

$sql="CREATE TABLE IF NOT EXISTS libri_19(
        id_libro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titolo VARCHAR(255) NOT NULL UNIQUE,
        autore VARCHAR(255) NOT NULL,
        casa_ed VARCHAR(255) NOT NULL,
        isbn VARCHAR(255) NOT NULL,
        genere VARCHAR(255) NOT NULL,
        immagine VARCHAR(255) NOT NULL
    )";
if( $conn->query($sql))
    echo '<br>TABLE libri_19 creata';
else echo '<br>errore query: '.$conn->error;

$conn->close();
?>
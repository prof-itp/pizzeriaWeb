<?php
require_once('connetti.php');

session_start();
$_SESSION=array();
session_destroy();
header('location:index.php');

$conn->close();
?>
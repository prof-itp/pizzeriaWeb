<?php
require_once('connetti.php');

if( $_SERVER['REQUEST_METHOD']=='POST'){

    $email= $conn->real_escape_string($_POST['email']);
    $password= $conn->real_escape_string($_POST['password']);

    $sql="SELECT * FROM ammin WHERE email='$email'";
    if($result=$conn->query($sql)){
        if( $result->num_rows == 1){

            $row=$result->fetch_array();
            if( password_verify($password, $row['password'])){
                
                session_start();
                $_SESSION['loggato'] = true;
                $_SESSION['email'] = $row['email'];
                header('location:amministra_html.php');

            }else echo '<br>password errata';

        }else echo '<br>email non presente';
    }else echo '<br>errore query: '.$conn->error;

}else echo '<br>errroe trasmissione dati form';

$conn->close();
?>
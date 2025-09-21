<?php
require_once('connetti.php');

if( $_SERVER['REQUEST_METHOD']=='POST'){

    $email= $conn->real_escape_string($_POST['email']);
    $password= $conn->real_escape_string($_POST['password']);

    $sql="SELECT * FROM ammin WHERE email='$email'";
    if($result=$conn->query($sql)){
        if( $result->num_rows == 0){

            $errori;
            if( strlen($password) < 4 )
                $errori[]="4 caratteri";
            if( !preg_match('/[A-Z]/', $password))
                $errori[]="una lettera maiuscola";
            if( !preg_match('/[\W]/', $password))
                $errori[]="un carattere speciale ";
            if( !preg_match('/[0-9]/', $password))
                $errori[]="un numero ";
            if( !empty($errori)){
                echo '
                     <div style="text-align:center; background-color:lightgrey; border: 2px solid green; border-radius:20px; margin:auto; width:85%; font-size:x-large;">
                        <br>La password deve contenere almeno:<br>
                        <ul style="text-align:left; display:inline-block; list-style-type:lower-alpha;">
                    ';
                foreach($errori as $errore)
                    echo '<li>'.$errore.'</li>';
                echo '
                        </ul>
                    </div>
                    ';
            }else {
                $password_hash= password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO ammin ( email, password)
                        VALUE ( '$email', '$password_hash')
                    ";
                if( $conn->query($sql)){
                    header('location:accedi_html.php');
                }else echo '<br>errore query: '.$conn->error;
             }

        }else echo '<br>email già presente';
    }else echo '<br>errore query: '.$conn->error;

}else echo '<br>errroe trasmissione dati form';

$conn->close();
?>
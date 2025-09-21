<?php
require_once('connetti.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 style="text-align:center;">Home</h1>

    <h3><a href="amministra_html.php">amministra</a></h3>

    <h2 style="text-align:center; background-color:beige; color:green; border: 2px solid green; border-radius:20px; margin:auto; width:25%;">
        Lista dei libri ordinati per genere: 
    </h2>

    <?php

        $sql="SELECT * FROM libri_19 ORDER BY genere";
        if( $result=$conn->query($sql)){
            if($result->num_rows > 0 ){

                echo '
                        <table width=80% style="text-align:center; border:double; border-color: red;margin:auto;">
                            <thead>
                                <tr style=" background-color:beige; color:red;">
                                    <th style="border:groove; border-color:blue;">id_libro</th>
                                    <th style="border:groove; border-color:blue;">titolo</th>
                                    <th style="border:groove; border-color:blue;">autore</th>
                                    <th style="border:groove; border-color:blue;">casa_ed</th>
                                    <th style="border:groove; border-color:blue;">isbn</th>
                                    <th style="border:groove; border-color:blue;">genere</th>
                                    <th style="border:groove; border-color:blue;">immagine</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';
                while($row= $result->fetch_array()){
                    echo '
                            <tr>
                                <td style="border-bottom: 1px solid aqua;">'.$row['id_libro'].'</td>
                                <td style="border-bottom: 1px solid aqua;">'.ucwords($row['titolo']).'</td>
                                <td style="border-bottom: 1px solid aqua;">'.ucwords($row['autore']).'</td>
                                <td style="border-bottom: 1px solid aqua;">'.ucwords($row['casa_ed']).'</td>
                                <td style="border-bottom: 1px solid aqua;">'.ucwords($row['isbn']).'</td>
                                <td style="border-bottom: 1px solid aqua;">'.ucwords($row['genere']).'</td>
                                <td style="border-bottom: 1px solid aqua;"><img src="./imm/'.$row['immagine'].'" alt="'.ucwords($row['immagine']).'" title="'.ucwords($row['immagine']).'" width=100 height=100> </td>
                            </tr>
                        ';
                }
                echo '
                            </tbody>
                        </table>
                    ';

            }else echo '<br><h3 style="text-align:center; background-color:bisque; color:darkred; border: 2px solid green; border-radius:20px; margin:auto; width:35%;">
                                Lista dei libri vuota !
                            </h3>';
        }else echo '<br>errore query: '.$conn->error;

    ?>

</body>
</html>

<?php

        echo '
                <br><br>
                <a href="index.php">Home</a>
                <br><br>
                <a href="amministra_html.php">amministra</a>
            ';
        if( isset($_SESSION['loggato']) && $_SESSION['loggato'] == true)
        echo '
                <br><br>
                <a href="logout.php">logout</a>
            ';
$conn->close();
?>
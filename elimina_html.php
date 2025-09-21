<?php
require_once('connetti.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>elimina</title>
</head>
<body>
    <h1 style="text-align:center;">elimina libro:</h1>


    <?php

        $sql="SELECT * FROM libri_19 ORDER BY titolo";
        if( $result= $conn->query($sql)){
            if( $result->num_rows > 0){

                echo '
                    <form action="elimina.php" method="post" enctype="multipart/form-data" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:25%;">
                        <p> libro: ( id - titolo)
                        <select name="id_libro" style="border-color:blue; border-radius:20px;">
                    ';
                while($row=$result->fetch_array()){
                    echo '
                            <option value="'.$row['id_libro'].'">'.$row['id_libro'].' - '.ucwords($row['titolo']).'</option>
                        ';
                }
                echo '
                        </select>
                        </p>
                         <input type="submit" value="elimina" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">
                    </form>
                    ';

            }else echo '<br> <h2 style="text-align:center;">Nessun libro da eliminare</h2>';
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
$conn->close();
?>
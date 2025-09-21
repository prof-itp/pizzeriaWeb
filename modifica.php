<?php
require_once('connetti.php');

if( $_SERVER['REQUEST_METHOD']=='POST'){

    $id_libro= $conn->real_escape_string($_POST['id_libro']);

    $sql="SELECT * FROM libri_19 WHERE id_libro='$id_libro'";
    if($result=$conn->query($sql)){
        if( $result->num_rows == 1){

            $row=$result->fetch_array();
           
            echo '
                <h1 style="text-align:center;">modifica libro</h1>

                <form action="modifica1.php" method="post" enctype="multipart/form-data" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:25%;">
                    <p>
                        <label for="id_libro">id_libro </label>
                        <input type="text" id="id_libro" name="id_libro" readonly value="'.$row['id_libro'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="titolo">titolo (univoco)</label>
                        <input type="text" id="titolo" name="titolo" required  value="'.$row['titolo'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="autore">autore</label>
                        <input type="text" id="autore" name="autore" required value="'.$row['autore'].'"  style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="casa_ed">casa_ed</label>
                        <input type="text" id="casa_ed" name="casa_ed" required  value="'.$row['casa_ed'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="isbn">isbn</label>
                        <input type="text" id="isbn" name="isbn" required  value="'.$row['isbn'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="genere">genere</label>
                        <input type="text" id="genere" name="genere" required  value="'.$row['genere'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <p>
                        <label for="immagine_v">immagine precedente: </label>
                        <input type="text" id="immagine_v" name="immagine_v" readonly  value="'.$row['immagine'].'" style="border-color:blue; border-radius:20px;">
                    </p>
                    <figure>
                        Immagine precedente:
                        <figcaption>
                            <img src="./imm/'.$row['immagine'].'" alte="'.$row['immagine'].'" title="'.$row['immagine'].'" width=100 height=100>
                        </figcaption>
                    </figure>
                    <p>
                        <label for="immagine">immagine (univoca)</label>
                        <input type="file" id="immagine" name="immagine" required style="border-color:blue; border-radius:20px; background-color:beige;">
                        <div style="text-align:center; background-color:lightgrey; border: 2px solid green; border-radius:20px; margin:auto; width:85%; font-size:small;">
                            <br>L\'immagine deve avere:<br>
                            <ul style="text-align:left; display:inline-block; list-style-type:lower-alpha;">
                                <li>una estensione compresa tra png, jpg e jpeg</li>
                                <li>una dimensione massima di 5 Mb</li>
                                <li>deve essere unica per ogni libro</li>
                            </ul>
                        </div>
                    </p>
                    <input type="submit" value="modifica" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">
                </form>
                ';
            

        }else echo '<br>libro non presente';
    }else echo '<br>errore query: '.$conn->error;


}else echo '<br>errroe trasmissione dati form';

       

echo '
    <br><br>
    <a href="index.php">Home</a>
    <br><br>
    <a href="amministra_html.php">amministra</a>
    <br><br>
    <a href="modifica_html.php">modifica_html</a>
    ';

$conn->close();
?>
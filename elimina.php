<?php
require_once('connetti.php');

if( $_SERVER['REQUEST_METHOD']=='POST'){

    $id_libro= $conn->real_escape_string($_POST['id_libro']);

    $sql="SELECT * FROM libri_19 WHERE id_libro='$id_libro'";
    if($result=$conn->query($sql)){
        if( $result->num_rows == 1){

            $row=$result->fetch_array();
            $immagine= $row['immagine'];

            $sql="DELETE FROM libri_19 WHERE id_libro='$id_libro' ";
            if( $conn->query($sql)){
                unlink('./imm/'.$immagine);
                
            }else echo '<br>errore query: '.$conn->error;
            

        }else echo '<br>libro non presente';
    }else echo '<br>errore query: '.$conn->error;


}else echo '<br>errroe trasmissione dati form';

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

echo '
    <br><br>
    <a href="index.php">Home</a>
    <br><br>
    <a href="amministra_html.php">amministra</a>
    <br><br>
    <a href="elimina_html.php">elimina_html</a>
    ';

$conn->close();
?>
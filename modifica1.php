<?php
require_once('connetti.php');

if( $_SERVER['REQUEST_METHOD']=='POST'){

    if( isset($_FILES['immagine']) && $_FILES['immagine']['error'] == 0){

        $id_libro= $conn->real_escape_string($_POST['id_libro']);
        $titolo= $conn->real_escape_string($_POST['titolo']);
        $autore= $conn->real_escape_string($_POST['autore']);
        $casa_ed= $conn->real_escape_string($_POST['casa_ed']);
        $isbn= $conn->real_escape_string($_POST['isbn']);
        $genere= $conn->real_escape_string($_POST['genere']);
        $immagine_v= $conn->real_escape_string($_POST['immagine_v']);
        $immagine= $_FILES['immagine']['name'];

        $titolo= strtolower(trim($titolo));
        $autore= strtolower(trim($autore));
        $casa_ed= strtolower(trim($casa_ed));
        $isbn= strtolower(trim($isbn));
        $genere= strtolower(trim($genere));
        $immagine= strtolower(trim($immagine));



        $sql="SELECT * FROM libri_19 WHERE titolo='$titolo' AND id_libro!='$id_libro'";
        if($result=$conn->query($sql)){
            if( $result->num_rows == 0){

               $estensione_imm= pathinfo($_FILES['immagine']['name'], PATHINFO_EXTENSION);
               $estensioni_permesse=['png'=>'image/png', 'jpg'=>'image/jpg', 'jpeg'=>'image/jpeg' ];
               if( !array_key_exists($estensione_imm, $estensioni_permesse))
                die('<br><h2 style="text-align:center;">
                            estensione immagine errata !
                        </h2>');

                $size_imm= $_FILES['immagine']['size'];
                $size_max= 5*1024*1024;
                if( $size_imm > $size_max)
                    die('<br><h2 style="text-align:center;">
                                dimensione immagine errata !
                            </h2>');

                if( file_exists('./imm/'.$immagine)){
                    $sql="SELECT * FROM libri_19 WHERE immagine='$immagine' AND id_libro!='$id_libro'";
                    if($result=$conn->query($sql)){
                        if( $result->num_rows > 0){
                            die('<br><h2 style="text-align:center;">
                                        immagine già assegnata a un altro libro !
                                    </h2>');
                        }
                    }else echo '<br>errroe query: '.$conn->error;
                }
                    

             
                $sql="UPDATE libri_19 
                        SET titolo='$titolo' , autore='$autore', casa_ed='$casa_ed', isbn='$isbn', genere='$genere', immagine='$immagine'
                        WHERE id_libro='$id_libro'
                    ";
                if( $conn->query($sql)){
                    unlink('./imm/'.$immagine_v);
                    move_uploaded_file($_FILES['immagine']['tmp_name'], './imm/'.$immagine);
                    
                }else echo '<br>errore query: '.$conn->error;
              

            }else echo '<br>titolo già assegnato a un altro libro';
        }else echo '<br>errore query: '.$conn->error;

    }else echo '<br>errore trasmissione immagine';

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
    <a href="modifica_html.php">modifica_html</a>
    ';

$conn->close();
?>
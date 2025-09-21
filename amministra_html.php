<?php
require_once('connetti.php');
session_start();
if( !isset($_SESSION['loggato']) || $_SESSION['loggato'] != true)
    header('location:accedi_html.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>amministra</title>
</head>
<body>
    <h1 style="text-align:center;">amministra</h1>

    <h2 style="text-align:center; background-color:beige; color:green; border: 2px solid green; border-radius:20px; margin:auto; width:25%;">
        Lista operazioni sui libri: 
    </h2>

    <table width=40% style="text-align:center; border:double; border-color: darkred;margin:auto; font-size:x-large; margin-top:30px;">
        <thead>
            <tr style=" background-color:beige; color:darkred;">
                <th style="border:groove; border-color:blue;">inserisci libro</th>
                <th style="border:groove; border-color:blue;">modifica libro</th>
                <th style="border:groove; border-color:blue;">elimina libro</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-bottom: 1px solid aqua;">
                <form action="inserisci_html.php" method="post" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:95%;">
                    <button type="submit" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">Inserisci</button>
                </form>
            </td>
            <td style="border-bottom: 1px solid aqua;">
                <form action="modifica_html.php" method="post" style="text-align:center; background-color:lightyellow; border: 2px solid blue; border-radius:20px; margin:auto; width:95%;">
                    <button type="submit" style="background-color:black; color:yellow; border-color:blue; border-radius:20px; font-size:large;">modifica</button>
                </form>
            </td>
            <td style="border-bottom: 1px solid aqua;">
                <form action="elimina_html.php" method="post" style="text-align:center; background-color:lightgreen; border: 2px solid blue; border-radius:20px; margin:auto; width:95%;">
                    <button type="submit" style="background-color:black; color:lime; border-color:blue; border-radius:20px; font-size:large;">elimina</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
                    

</body>
</html>

<?php
echo '
<br><br>
<a href="index.php">Home</a>
<br><br>
<a href="amministra_html.php">amministra</a>
 <br><br>
                <a href="logout.php">logout</a>
';
$conn->close();
?>
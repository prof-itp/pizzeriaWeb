<?php
require_once('connetti.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserisci</title>
</head>
<body>
    <h1 style="text-align:center;">inserisci</h1>

    <form action="inserisci.php" method="post" enctype="multipart/form-data" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:25%;">
        <p>
            <label for="titolo">titolo (univoco)</label>
            <input type="text" id="titolo" name="titolo" required style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="autore">autore</label>
            <input type="text" id="autore" name="autore" required style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="casa_ed">casa_ed</label>
            <input type="text" id="casa_ed" name="casa_ed" required style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="isbn">isbn</label>
            <input type="text" id="isbn" name="isbn" required style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="genere">genere</label>
            <input type="text" id="genere" name="genere" required style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="immagine">immagine (univoca)</label>
            <input type="file" id="immagine" name="immagine" required style="border-color:blue; border-radius:20px; background-color:beige;">
            <div style="text-align:center; background-color:lightgrey; border: 2px solid green; border-radius:20px; margin:auto; width:85%; font-size:small;">
                <br>L'immagine deve avere:<br>
                <ul style="text-align:left; display:inline-block; list-style-type:lower-alpha;">
                    <li>una estensione compresa tra png, jpg e jpeg</li>
                    <li>una dimensione massima di 5 Mb</li>
                    <li>deve essere unica per ogni libro</li>
                </ul>
            </div>
        </p>
        <input type="submit" value="inserisci" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">
    </form>
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
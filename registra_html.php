<?php
require_once('connetti.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registra</title>
</head>
<body>
    <h1 style="text-align:center;">registra</h1>

    <form action="registra.php" method="post" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:25%;">
        <p>
            <label for="email">email</label>
            <input type="email" id="email" name="email" required placeholder="a@a.a" style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="password">password</label>
            <input type="password" id="password" name="password" required placeholder="aA1!" style="border-color:blue; border-radius:20px;">
            <div style="text-align:center; background-color:lightgrey; border: 2px solid green; border-radius:20px; margin:auto; width:85%; font-size:small;">
                <br>La password deve contenere almeno:<br>
                <ul style="text-align:left; display:inline-block; list-style-type:lower-alpha;">
                    <li>4 caratteri</li>
                    <li>una lettera maiuscola</li>
                    <li>un carattere speciale</li>
                    <li>un numero</li>
                </ul>
            </div>
        </p>
        <input type="submit" value="registra" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">
        <br>Hai già un account? <a href="accedi_html.php">accedi</a>
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
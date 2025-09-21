<?php
require_once('connetti.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi</title>
</head>
<body>
    <h1 style="text-align:center;">Accedi</h1>

    <form action="accedi.php" method="post" style="text-align:center; background-color:lightblue; border: 2px solid blue; border-radius:20px; margin:auto; width:25%;">
        <p>
            <label for="email">email</label>
            <input type="email" id="email" name="email" required placeholder="a@a.a" style="border-color:blue; border-radius:20px;">
        </p>
        <p>
            <label for="password">password</label>
            <input type="password" id="password" name="password" required placeholder="aA1!" style="border-color:blue; border-radius:20px;">
        </p>
        <input type="submit" value="accedi" style="background-color:black; color:azure; border-color:blue; border-radius:20px; font-size:large;">
        <br>Non hai ancora un account? <a href="registra_html.php">Registrati</a>
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
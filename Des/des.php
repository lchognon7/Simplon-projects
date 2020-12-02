<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<img src = "dice.svg">
<h1>L'OUVRE BOÎTE</h1>

<?php

echo ("<div class = 'resultat'>");

$choix_faces = $_POST['faces'] ?? false;
$choix_des = $_POST['des'] ?? false;
$numde = 1;

$i = 1;

echo("<div class = 'resultat_des'>");

while($i <= $choix_des){

echo 'Dé n° ' . $numde . ' = ' . random_int(1, $choix_faces);

echo '</br>';

$i++;
$numde++;

}

echo("</div>");

echo ("<form action = 'des.php' method = 'post'>
        <input id = 'des' name = 'des' type = 'hidden' value = '$choix_des'>
        <input id = 'faces' name = 'faces' type = 'hidden' value = '$choix_faces'>
        <input class = 'btnRelancer' type = 'submit' value = 'RELANCER'>
    </form>");

echo "<form action = 'index.php' method='post'>
        <input class = 'btnRetour' type = 'submit' value='RETOUR'>";

echo ("</div>");
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

include "landing.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $bgcolor = $_POST['bgcolor'];


    $requete = "UPDATE `bgcolor`
                SET `color` = :bgcolor
                WHERE `id_bgcolor` = 1";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":bgcolor" => $bgcolor
    ));
    $resultat = $prepare->rowCount();



} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

header('Refresh:2; url=admin.php');
echo 'La couleur du background a bien été modifiée.';


?>
</body>
</html>
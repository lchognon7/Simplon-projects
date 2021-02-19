<?php

include "landing.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $phrase1 = $_POST['phrase1'];
    $phrase2 = $_POST['phrase2'];
    $phrase3 = $_POST['phrase3'];


    $requete = "UPDATE `presentation`
                SET `phrase1` = :phrase1, `phrase2` = :phrase2, `phrase3` = :phrase3 
                WHERE `id_presentation` = 4";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":phrase1" => $phrase1,
      ":phrase2" => $phrase2,
      ":phrase3" => $phrase3
    ));
    $resultat = $prepare->rowCount();



} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

header('Refresh:2; url=admin.php');
echo 'Le message a bien été modifié';


?>
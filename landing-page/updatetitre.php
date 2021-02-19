<?php

include "landing.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $titre = $_POST['titre'];


    $requete = "UPDATE `title`
                SET `titre` = :titre
                WHERE `id_title` = 1";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":titre" => $titre
    ));
    $resultat = $prepare->rowCount();



} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

header('Refresh:2; url=admin.php');
echo 'Le titre a bien été modifié';


?>
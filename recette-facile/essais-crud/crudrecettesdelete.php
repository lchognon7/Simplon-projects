<?php

include "recette-facile.dbconf.php";

$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

$requete = "DELETE FROM `recettes`
                WHERE ((`recette_titre` = :recette_titre));";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      "recette_titre" => $_POST['delete'],
    )); 
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

?>
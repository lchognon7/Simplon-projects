<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><pre><?php

include "recette-facile.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    
    // Requête de modification

    $requete = "UPDATE `recettes`
                SET `recette_titre` = :recette_titre
                WHERE `recette_id` = :recette_id";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":recette_id"   => 3,
      ":recette_titre" => "☔️ Galette bretonne"
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

    // Requête de suppression

    $requete = "DELETE FROM `recettes`
                WHERE ((`recette_id` = :recette_id));";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      "recette_id" => 6,
    )); 
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

    } catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

?>
    
</body>
</html>
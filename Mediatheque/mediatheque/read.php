<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // SELECT pour recherche un film par son titre

    $recherche_titre = strip_tags($_POST['recherche_titre']);

    $requete = "SELECT * FROM `films` 
                WHERE `titre` = :titre";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
    ":titre" => $recherche_titre
    ));
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "</br>Titre : " . $value['titre'] . "</br></br>";
        echo "Réalisateur : " . $value['realisateur'] . "</br></br>";
        echo "Acteurs : " . $value['acteurs'] . "</br></br>";
        echo "Synopsis : " . $value['synopsis'] . "</br></br>";
        echo "<img src='" . $value['affiche'] . "/>";
            
    }


} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}


?>
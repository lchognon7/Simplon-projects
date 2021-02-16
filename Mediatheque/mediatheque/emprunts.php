<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $titre = strip_tags($_POST['liste_titre']);

    function dateFr($date){
        return strftime('%d-%m-%Y',strtotime($date));
        }

    $requete = "SELECT * FROM `films` 
                WHERE `titre` = :titre";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
    ":titre" => $titre
    ));
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo $titre . "</br>";
        echo "Date d'emprunt : " . dateFr($value['date_sortie']) . "</br>";
        echo "Date de retour : " . dateFr($value['date_entree']);
    }



} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}


?>
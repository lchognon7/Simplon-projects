<?php

include "microurl.dbconf.php";

try{

$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

// Requête de selection

echo '<pre>';

$requete = "SELECT * FROM `url` WHERE `id_url` = 1";
$prepare = $connexion->prepare($requete);
$prepare->execute();
$resultat = $prepare->fetchAll();
print_r([$requete, $resultat]);

// Requête d'insertion

$requete = "INSERT INTO `url` (`url`, `shortcut`, `datetime`, `description`)
            VALUES (:url, :shortcut, :datetime, :description);";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
    ":url" => "URL3 qui est super long",
    ":shortcut" => "URL3 court",
    ":datetime" => date('Y-m-d H:i:s'),
    ":description" => "lorem ipsum3"
    ));
$resultat = $prepare->rowCount();
$lastInsertedUrlId = $connexion->lastInsertId();
print_r([$requete, $resultat, $lastInsertedUrlId]); 

// Requête de modification

$requete = "UPDATE `url`
            SET `description` = :description
            WHERE `id_url` = :id_url;";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
        ":id_url" => $lastInsertedUrlId,
        ":description" => "Description modifiée"
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

// Requête de suppression

$requete = "DELETE FROM `url`
            WHERE `id_url` = :id_url;";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":id_url" => 9,
    )); 
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

// Requête d'insertion avec une entrée précise

$requete = "INSERT INTO `url` (`url`, `shortcut`, `datetime`, `description`)
            VALUES (:url, :shortcut, :datetime, :description);";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
    ":url" => "https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/",
    ":shortcut" => "ztz7",
    ":datetime" => date('Y-m-d H:i:s'),
    ":description" => "L'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d'accéder aux données des autres joueurs."
    ));
$resultat = $prepare->rowCount();
$lastInsertedPiratageId = $connexion->lastInsertId();
print_r([$requete, $resultat]); 

// Ajouter le hashtag piratage

$requete = "INSERT INTO `keyword` (`keyword`)
            VALUES (:keyword);";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
    ":keyword" => "piratage"
    ));
$resultat = $prepare->rowCount();
$lastInsertedKeywordId = $connexion->lastInsertId();
print_r([$requete, $resultat]);

// Requête pour lier le hashtag piratage à l'entrée de l'étape 7

$requete = "INSERT INTO `assoc_url_keyword` (`assoc_url_id`, `assoc_keyword_id`)
            VALUES (:assoc_url_id, :assoc_keyword_id);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":assoc_url_id" => $lastInsertedPiratageId,
      ":assoc_keyword_id" => $lastInsertedKeywordId,
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

// Requête de selection hashtag 'piratage'

$requete = 'SELECT keyword, url
    FROM `assoc_url_keyword`    
    JOIN `keyword` ON id_keyword = assoc_keyword_id
    JOIN `url` ON id_url = assoc_url_id
    WHERE id_keyword = 10';
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);
    
} catch (PDOException $e) {
exit("CKC " . $e->getMessage());
}

echo '</pre>';

?>
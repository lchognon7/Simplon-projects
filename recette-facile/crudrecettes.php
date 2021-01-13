<?php

echo '<pre>';

include "recette-facile.dbconf.php";

$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

$recherche = strip_tags($_POST['rechercher']);

$requete = 'SELECT hashtags.hashtag_nom, recettes.recette_titre
FROM `assoc_hashtags_recettes`    
INNER JOIN hashtags ON hashtag_id = assoc_hashtags_recettes.assoc_hr_hashtag_id
INNER JOIN recettes ON recette_id = assoc_hashtags_recettes.assoc_hr_recette_id
WHERE hashtag_nom = :hashtag_nom';
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
    ":hashtag_nom" => $recherche,
));
$resultat = $prepare->fetchAll();
print_r([$requete, $resultat]);

// Insérer de nouvelles recettes dans la BDD

$titre = strip_tags($_POST['titre']);
$contenu = strip_tags($_POST['contenu']);

$requete = "INSERT INTO `recettes` (`recette_titre`, `recette_contenu`, `recette_datetime`)
            VALUES (:recette_titre, :recette_contenu, :recette_datetime);";
$prepare = $connexion->prepare($requete);
$prepare->execute(array(
 ":recette_titre" => $titre,
 ":recette_contenu" => $contenu,
 ":recette_datetime" => date('Y-m-d H:i:s'),
));
$resultat = $prepare->rowCount();
print_r([$requete, $resultat]); 

echo '</pre>';

?>
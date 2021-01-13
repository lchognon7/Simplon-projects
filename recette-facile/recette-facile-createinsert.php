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
    // requête de selection

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    $requete = "SELECT * FROM `recettes`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);

    // requête d'insertion

    $requete = "INSERT INTO `recettes` (`recette_titre`, `recette_contenu`, `recette_datetime`)
                VALUES (:recette_titre, :recette_contenu, :recette_datetime);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":recette_titre" => "Galette bretonne",
      ":recette_contenu" => "1. Dans un saladier, mélanger la farine et le gros sel. 
      2. A l'aide d'un fouet, verser l'eau en deux ou trois fois, tout en mélangeant la préparation. On obtient une pâte lisse et épaisse à laquelle on ajoute un oeuf pour donner une belle coloration à la cuisson. 
      3. Filmer et laisser reposer 1 à 2 heures au réfrigérateur. 
      4. Graisser la crêpière avec une coton imbibé d'huile. Verser une louche de pâte, attendre que la galette colore pour la décoller à l'aide d'une spatule et la retourner. La laisser cuire encore 1 minute environ. ",
      ":recette_datetime" => date('Y-m-d H:i:s'),
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]); 

    // Requête d'insertion "levain" dans la table hashtags

    $requete = "INSERT INTO `hashtags` (`hashtag_nom`)
                VALUES (:hashtag_nom);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":hashtag_nom" => "levain",
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]); 

    // requête pour lier la recette du pain au hashtag levain

    $requete = "INSERT INTO `assoc_hashtags_recettes` (`assoc_hr_hashtag_id`, `assoc_hr_recette_id`)
                VALUES (:assoc_hr_hashtag_id, :assoc_hr_recette_id);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":assoc_hr_hashtag_id" => "4",
      ":assoc_hr_recette_id" => "1",
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]);

    // Pour aller plus loin

    $requete = 'SELECT hashtags.hashtag_nom, recettes.recette_titre
    FROM `assoc_hashtags_recettes`    
    INNER JOIN hashtags ON hashtag_id = assoc_hashtags_recettes.assoc_hr_hashtag_id
    INNER JOIN recettes ON recette_id = assoc_hashtags_recettes.assoc_hr_recette_id
    WHERE hashtag_id = 1';
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    print_r([$requete, $resultat]);

    } catch (PDOException $e) {
    exit("CKC" . $e->getMessage());

    }

?>
    
</body>
</html>
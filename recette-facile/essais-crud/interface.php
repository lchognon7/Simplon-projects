<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rechercher une recette par hashtag</h1>
    <form action="crudrecettes.php" method="POST">
        <input type="text" name="rechercher" placeholder="Quel hashtag souhaitez vous chercher ?">
        <input type="submit" value ="Rechercher">
    </form>
    <h1>Enregistrer une nouvelle recette dans la base de données:</h1>
    <form action="crudrecettes.php" method="POST">
        <input type="text" name="titre" placeholder="Titre de la recette" required>
        <input type="text" name="contenu" placeholder="Contenu de la recette" required>
        <input type="submit" value="Enregistrer">
    </form>
    <?php

    // Suppprimer un élément de la BDD
    // Connexion à la BDD

    include "recette-facile.dbconf.php";

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Liste déroulante qui récupère les infos de la BDD via un SELECT
    
    echo "<h1>Supprimer une recette dans la liste</h1>
        <form action='crudrecettesdelete.php' method='POST'>
        <select name='delete' id='delete'>";

        $requete = "SELECT `recette_titre` FROM `recettes`";
        $prepare = $connexion->prepare($requete);
        $prepare->execute();
        $resultat = $prepare->fetchAll();
        print_r($resultat);

        // Exploration du tableau résultat et affichage de chaque recette

        foreach($resultat as $key => $value){
            echo '<option value="' . $value['recette_titre'] . '">' . $value['recette_titre'] . '</option>';
        }

        echo '</select>';
        echo "</br></br><input type='submit' value='Supprimer'>";
        echo '</form>';

        // Update la BDD (pas terminé)

        echo "<h1>Mettre à jour le contenu d'une recette</h1>
        <form action='crudtextarea.php' method='POST'>
        <select name='update' id ='update'>";

        $requete = "SELECT `recette_titre` FROM `recettes`";
        $prepare = $connexion->prepare($requete);
        $prepare->execute();
        $resultat = $prepare->fetchAll();
        print_r($resultat);

        foreach($resultat as $key => $value){
            echo '<option value="' . $value['recette_titre'] . '">' . $value['recette_titre'] . '</option>';
        }

        echo '</select>';
        echo "</br></br><input type='submit' value='Mettre à jour'>";
        echo '</form>';
    ?>
</body>
</html>
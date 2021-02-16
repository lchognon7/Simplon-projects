<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Ajouter un nouveau film dans la BDD -->

    <form action="insert.php" method="POST">
        <h2>Ajouter un nouveau film dans la base de données</h2>
        <input type="text" name="titre" placeholder="Titre">
        <input type="text" name="realisateur" placeholder="Réalisateur">
        <input type="text" name="acteur" placeholder="Acteurs">
        <input type="date" name="sortie" placeholder="Date de sortie">
        <input type="text" name="synopsis" placeholder="synopsis">
        <input type="text" name="affiche" placeholder="URL de l'affiche">
        <input type="submit">
    </form>

    <!-- Rechercher un film -->

    <form action="read.php" method="POST">
        <h2>Rechercher un film dans la base de données</h2>
        <input type="text" name="recherche_titre" placeholder = "Quel film recherchez vous ?">
        <input type="submit">
    </form>

    <!-- Afficher une les dates d'emprunt et de retour -->

    <h2>Voir les dates d'emprunt et de retour</h2>

    <form action="emprunts.php" method="POST">
        <select name="liste_titre">
    <?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $requete = "SELECT * FROM `films`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<option value='" .$value['titre'] . "'>" . $value ['titre'] . "</option>";
    }

} catch (PDOException $e) {
    exit("erreur" . $e->getMessage());
}
?>
</select>
<input type="submit">
</form>
    

    <!-- Liste déroulante pour afficher les films à update -->

    <h2>Choisissez un film à modifier</h2>

    <form action="textarea.php" method="POST">
        <select name="liste_titre">
    <?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $requete = "SELECT * FROM `films`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<option value='" .$value['titre'] . "'>" . $value ['titre'] . "</option>";
    }

} catch (PDOException $e) {
    exit("erreur" . $e->getMessage());
}
?>
</select>
<input type="submit">
</form>

<!-- liste dérouloulante pour afficher les films à supprimer -->

<h2>Choisissez un film à supprimer</h2>

    <form action="delete.php" method="POST">
        <select name="liste_titre">
    <?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $requete = "SELECT * FROM `films`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<option value='" .$value['titre'] . "'>" . $value ['titre'] . "</option>";
    }

} catch (PDOException $e) {
    exit("erreur" . $e->getMessage());
}
?>
</select>
<input type="submit">
</form>

<!-- liste déroulante pour ajouter une date d'emprunt et de retour -->

<h2>Ajouter une date d'emprunt et/ou de retour</h2>

    <form action="textareaemprunt.php" method="POST">
        <select name="liste_titre">
    <?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $requete = "SELECT * FROM `films`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<option value='" .$value['titre'] . "'>" . $value ['titre'] . "</option>";
    }

} catch (PDOException $e) {
    exit("erreur" . $e->getMessage());

}

?>
</select>
<input type="submit">
</form>


</body>
</html>



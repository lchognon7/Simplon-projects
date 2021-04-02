<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_up.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

<!-- header -->
    
<div class="nav">
                <a href="index.php">→ Accueil</a>
                <a href="styles.php">→ Styles</a>
                <a href="genres.php">→ Genres</a>
                <a href="artists.php">→ Artistes</a>
    </div>

    <!-- Barre de recherche par style -->

    <div class="recherche">
        <form action="recherche.php" method="POST">
            <label for="style_recherche">Rechercher des artistes par style</label>
            <select name="style_recherche">
                <!-- Récupération de tous les styles pour les afficher dans la liste déroulante-->
            <?php foreach($resultat as $style): ?>
                    <option value="<?= htmlentities($style['style_name']); ?>"><?= htmlentities($style['style_name']); ?></option>
                <?php endForeach; ?>
            </select>
            <input type="submit" name="recherche" value="🔍">
        </form>
    </div>

<?php

include "melomane.dbconf.php";
include "requetes.class.php";

// Requête pour afficher les styles dans la liste déroulante 

$req = new Requete();
$resultat = $req->read('styles'); 

if(isset($_POST['addstyle'])){
?>

<!-- formulaire d'ajout d'association d'un nouveau style pourl'artiste sélectionné dans artists.php -->

<div class='resultat'>
<form method="POST">
<label for="styles">Ajouter un nouveau style pour <?= htmlentities($_POST['artist_name']); ?></label></br>
<input type="text" hidden name="artist_id" value="<?= htmlentities($_POST['artist_id']); ?>">
<select name="styles">

<?php foreach($resultat as $style): ?>

    <option value="<?= htmlentities($style['style_name']); ?>"><?= htmlentities($style['style_name']); ?></option>

<?php endForeach; ?>

</select></br>
<input type="submit" name="submit_style">
</form>
</div>

<?php

}

// Si le bouton submit est cliqué 

if(isset($_POST['submit_style'])){
    
    try{

        // Connexion à la BDD 

        $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

        // Requête qui récupère l'id dans du style qui est celui du style_name posté au dessus dans la liste déroulante
        $requete = "SELECT style_id FROM `styles` WHERE `style_name` = :style_name";
        $prepare = $connexion->prepare($requete);
        $prepare->execute(array(
            ":style_name" => htmlentities($_POST['styles'])
        ));
        $resultat = $prepare->fetchAll();
        foreach($resultat as $id){
            $id = $id['style_id'];
        }

        // l'id de l'artiste et l'id du style récupéré au dessus est inséré dans la table associative

        $requete = "INSERT INTO `assoc_styles_artists` (`assoc_artist_id`, `assoc_style_id`)
                    VALUES (:assoc_artist_id, :assoc_style_id);";
        $prepare = $connexion->prepare($requete);
        $prepare->execute(array(
        ":assoc_artist_id" => $_POST['artist_id'],
        ":assoc_style_id" => $id
        ));
        $resultat = $prepare->rowCount();
        if($resultat > 0){
            echo "<div class='resultat'>Le nouveau style a bien été associé.</br><a href='artists.php'>Revenir aux artistes</a></div>";
        } else{
            echo "<div class='resultat'>Une erreur s'est produite durant l'association.</br><a href='artists.php'>Revenir aux artistes</a> </div>";
        }

        

} catch (PDOException $e) {
    exit("🚫" . $e->getMessage());

}

    
}

?>

</body>
</html>



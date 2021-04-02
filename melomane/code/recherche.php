<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel='stylesheet' href="style_rech.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

<?php

    include "melomane.dbconf.php";
    include "requetes.class.php";

    $req = new Requete();
    $resultat = $req->read('styles');

?>

<!-- header -->

    <div class="nav">
                <a href="index.php">→ Accueil</a>
                <a href="styles.php">→ Styles</a>
                <a href="genres.php">→ Genres</a>
                <a href="artists.php">→ Artistes</a>
    </div>

    <!-- barre de recherche par style -->

    <div class="recherche">
        <form action="recherche.php" method="POST">
            <label for="style_recherche">Rechercher des artistes par style</label>
            <select name="style_recherche">
            <?php foreach($resultat as $style): ?>
                    <option value="<?= htmlentities($style['style_name']); ?>"><?= htmlentities($style['style_name']); ?></option>
                <?php endForeach; ?>
            </select>
            <input type="submit" name="recherche" value="🔍">
        </form>
    </div>
<?php

// si le bouton de recherche posté renvoie true 

if(isset($_POST['recherche'])){ ?>

<div class="titre">
        <h1>Tous les artistes <?= htmlentities($_POST['style_recherche']); ?></h1>
    </div>

<?php

try{

    // Instanciation de PDO 

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Récupération de la valeur envoyée dans l'input de recherche 

    $style = htmlentities($_POST['style_recherche']);

    // requête de selection des artistes qui correspondent au style envoyé dans la recherche 

    $requete = 'SELECT artists.artist_name, styles.style_name
    FROM `assoc_styles_artists`    
    INNER JOIN artists ON artists_id = assoc_styles_artists.assoc_artist_id
    INNER JOIN styles ON style_id = assoc_styles_artists.assoc_style_id
    WHERE style_name = :style';
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
        ":style" => $style
    ));
    $resultat = $prepare->fetchAll();

    // boucle foreach pour afficher les noms d'artistes dans des badges bootstrap
    ?>

    <div class='resultat'>

    <?php
    
    // boucle foreach pour afficher tous les noms d'artistes qui correspondent au style demandé
    foreach($resultat as $result): ?>

        <h1><span class="badge bg-secondary"><?= htmlentities($result['artist_name']); ?></span></h1>

      <?php  
    endForeach;

    ?>

    </div>

    <?php


} catch (PDOException $e) {
    exit("" . $e->getMessage());
    }

}


?>
</body>
</html>

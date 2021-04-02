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

    <div class='resultat'>

<?php 

// Formulaires de modification à afficher selon le bouton submit coché sur la page précédente

if(isset($_POST['update_styles'])){ ?>

    <form method='POST'>
        <label for="a_modifier">Modifier ce style</label></br>
        <input type="text" name="a_modifier" value="<?= htmlentities($_POST['modif']); ?>"></br>
        <input type="text" name="id_modif" hidden value="<?= htmlentities($_POST['style_id']); ?>">
        <input type="submit" name='submit_style'>
    </form>

<?php
}

// formulaire de modification à afficher selon le bouton submit coché sur la page précédente 

elseif(isset($_POST['update_genres'])){ ?>

    <form method='POST'>
        <label for="a_modifier">Modifier ce genre</label></br>
        <input type="text" name="a_modifier" value="<?= htmlentities($_POST['modif']); ?>"></br>
        <input type="text" name="id_modif" hidden value="<?= htmlentities($_POST['genre_id']); ?>">
        <input type="submit" name='submit_genre'>
    </form>

<?php
}

// formulaire de modification à afficher selon le bouton submit coché sur la page précédente 

elseif(isset($_POST['update_artists'])){ ?>

    <form method='POST'>
        <label for="a_modifier">Modifier cet artiste</label></br>
        <input type="text" name="a_modifier" value="<?= htmlentities($_POST['modif']); ?>"></br>
        <input type="text" name="id_modif" hidden value="<?= htmlentities($_POST['artist_id']); ?>">
        <input type="submit" name='submit_artist'>
    </form>
<?php
}

?>

</div>

<?php

// Requêtes BDD 

include "melomane.dbconf.php";
include "requetes.class.php";

// requête à effectuer selon le submit pour mettre à jour le style, le genre ou l'artiste dans la BDD
// on passe les méthodes créées dans requetes.class.php

if(isset($_POST['submit_style'])){

    $req = new Requete();
    $resultat = $req->update('styles', 'style_name', 'style_id', $_POST['a_modifier'], $_POST['id_modif']);
}

elseif(isset($_POST['submit_genre'])){
    $req = new Requete();
    $resultat = $req->update('genres', 'genre_name', 'genre_id', $_POST['a_modifier'], $_POST['id_modif']);
}
elseif(isset($_POST['submit_artist'])){
    $req = new Requete();
    $resultat = $req->update('artists', 'artist_name','artists_id', $_POST['a_modifier'], $_POST['id_modif']);
}

?>


</body>
</html>
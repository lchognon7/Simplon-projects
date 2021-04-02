<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style_tab.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

<?php

// j'inclue les éléments de connexion à la bdd et le fichier de class

  include "melomane.dbconf.php";
  include "requetes.class.php";
  
  // lecture de la table styles pour afficher les styles dans la liste déroulante
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

    <div class="titre">
    Tous les artistes
    </div>

    <?php

    try{

        // connexion à la BDD
        $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

        // requête de sélection des artistes qui vont avec leur style dans la table associative 
        $requete = 'SELECT *
        FROM `assoc_styles_artists`    
        JOIN `artists` ON artists_id = assoc_artist_id
        JOIN `styles` ON style_id = assoc_style_id';
        $prepare = $connexion->prepare($requete);
        $prepare->execute();
        $resultat = $prepare->fetchAll(); ?>

        <table class="table table-dark table-hover">
    <thead>
        <tr>
        <!-- en tête du tableau -->
        <th scope="col">Artiste</th>
        <th scope="col">Style</th>
        <th scope="col">Ajouter un style</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>

    <?php

    $artiste=NULL;

    foreach($resultat as $artist): ?>

        <tr>
            <!-- case pour afficher l'artiste si celui-ci n'est pas égal à l'artiste affiché précédemment pour éviter les redites -->
            <td><?php if($artiste != $artist['artist_name']){
            $artiste = $artist['artist_name'];
            echo $artiste; } ?></td>
            <!-- case pour afficher le style lié à l'artiste dans la table assoc -->
            <td><?= $artist['style_name']; ?></td>
            <!-- Renvoie vers addstyle.php pour affilier un nouveau style -->
            <td>
                <form action="addstyle.php" method='POST'>
                    <input type="text" hidden name="artist_id"value="<?= $artist['assoc_artist_id']; ?>">
                    <input type="text" hidden name="artist_name" value="<?= $artist['artist_name'] ?>">
                    <input type="submit" class='addstyle' name='addstyle' value="+">
                </form> 
            </td>
            <td>
                <form method="POST" action ="update.php">
                    <!-- input caché pour récupérer l'id -->
                    <input type="text" hidden value="<?= $artist['assoc_artist_id'] ?>" name='artist_id'>
                    <!-- input caché pour récupérer et afficher le nom de l'artiste dans update.php -->
                    <input type="text" hidden name="modif" value="<?= $artist['artist_name']; ?>">
                    <input type="submit" class='update' name="update_artists" value="✏️">
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="text" hidden value="<?= $artist['assoc_artist_id'] ?>" name='artist_id'>
                    <input type="submit" class='delete' name="delete" value="🗑">
                </form>
            </td>
        </tr>
</body>
</html>

        <?php

        endForeach;

} catch (PDOException $e) {
    exit("🚫" . $e->getMessage());

}

if(isset($_POST['delete'])){
    $req = new Requete();
    $resultat = $req->delete('artists', 'artists_id', $_POST['artist_id']);
}


?>
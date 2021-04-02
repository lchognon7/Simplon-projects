<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melo' Sound - Retrouve tes musiques par styles et genres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style_index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

<!-- Header -->

    <div class="nav">
            <a href="index.php">→ Accueil</a>
            <a href="styles.php">→ Styles</a>
            <a href="genres.php">→ Genres</a>
            <a href="artists.php">→ Artistes</a>
    </div>

<!-- Titre -->

    <div class='titre'>
    <h1>Biblio'Sound</h1>
    <h2>Inna di place</h2>
    </div>

<!-- formulaire d'ajout d'un genre-->

    <div class="add_genre">
    <form action="" method="POST">
        <label for="genre_name">Ajouter un nouveau genre</label></br>
        <input type="text" placeholder="Nouveau genre ..."name="genre_name" required></br>
        <input type="submit" name="genre_submit"></br>
    </form>
    <a href="genres.php">→ Consulter tous les genres ←</a>
    </div>

    <?php

    include "requetes.class.php";
    include "melomane.dbconf.php";

// lecture de la table genre pour afficher les genres dans la liste déroulante

    $req = new Requete();
    $resultat = $req->read('genres');

    ?>

    <!-- Formulaire d'ajout d'un style avec son genre -->

    <div class="add_style">
        <form action="" method="POST">
            <label for="style_name">Ajouter un nouveau style</label></br>
            <input type="text" placeholder="Nouveau style ..."name="style_name" required></br>
            <select name="choix_genre"></br>
                <?php foreach($resultat as $genre): ?>
                    <option value="<?= $genre['genre_name']; ?>"><?= $genre['genre_name']; ?></option>
                <?php endForeach; ?>
            </select></br>
            <input type="submit" name="style_submit">
        </form>
        <a href="styles.php">→ Consulter tous les styles ←</a>
    </div>


    <?php 
    // lecture de la table style pour afficher les styles dans la liste déroulante
    $req = new Requete();
    $resultat = $req->read('styles'); ?>

    <!-- formulaire pour ajouter un artiste -->

    <div class="add_artist">
        <form method="POST">
            <label for="">Ajouter un nouvel artiste</label></br>
            <input type="text" placeholder="Nouvel artiste ..."name="artist_name" required></br>
            <select name="style_assoc"></br>
                <?php foreach($resultat as $style): ?>
                <option value="<?= $style['style_name']; ?>"><?= $style['style_name'] ?></option>
                <?php endForeach; ?>
            </select></br>
            <input type="submit" name="artist_submit">
        </form>
        <a href="artists.php">→ Consulter tous les artistes ←</a>
    </div>

    <?php 
    // lecture de la table styles pour afficher les styles dans la liste déroulante
    $req = new Requete();
    $resultat = $req->read('styles'); ?>

    <!-- formulaire de recherche par style -->

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

    try{
        // requête de selection

        $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

        // si il y a clic sur le bouton submit ajouter un nouveau genre

        if(isset($_POST['genre_submit'])){

            // on instancie un objet de la classe Requete et on passe la méthode insert pour insérer le nom dans la BDD

            $req = new Requete();
            $resultat = $req->insert('genres', 'genre_name', $_POST['genre_name']);
        }

        // sinon si il y a clic sur le bouton submit ajouter un nouveau style

        elseif(isset($_POST['style_submit'])){

            $requete = "SELECT genre_id FROM `genres` WHERE `genre_name` = :genre_name";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":genre_name" => $_POST['choix_genre']
            ));
            $resultat = $prepare->fetchAll();
            foreach($resultat as $id){
                $id = $id['genre_id'];
            }

        // on instancie un objet de la classe Requete et on passe la méthode insert pour insérer le nom dans la BDD

            $requete = "INSERT INTO `styles` (`style_name`, `style_genre_id`)
            VALUES (:style_name, :style_genre_id);";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":style_name" => $_POST['style_name'],
            ":style_genre_id" => $id
            ));
            $resultat = $prepare->rowCount();
            print_r([$requete, $resultat]); 
        }

        // sinon si il y a clic sur le bouton submit ajouter un nouvel artiste 

        elseif(isset($_POST['artist_submit'])){

            // requête pour récupérer l'id du style qui correspond au nom du style sélectionné dans la liste déroulante

            $requete = "SELECT style_id FROM `styles` WHERE `style_name` = :style_name";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":style_name" => $_POST['style_assoc']
            ));
            $resultat = $prepare->fetchAll();
            foreach($resultat as $id){
            $id = $id['style_id'];
                }
        
        // reqête pour insérer le nouvel artiste dans la table artists

            $requete = "INSERT INTO `artists` (`artist_name`)
            VALUES (:artist_name);";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":artist_name" => $_POST['artist_name']
            ));
            $resultat = $prepare->rowCount();
            $last_id = $connexion->lastInsertId();
            print_r([$requete, $resultat]); 

            // requête pour insérer l'id du nouvel artiste ainsi que l'id récupéré du style dans la table associative

            $requete = "INSERT INTO `assoc_styles_artists` (`assoc_artist_id`, `assoc_style_id`)
                        VALUES (:assoc_artist_id, :assoc_style_id);";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
            ":assoc_artist_id" => $last_id,
            ":assoc_style_id" => $id
            ));
            $resultat = $prepare->rowCount();
            print_r([$requete, $resultat]); 
        }

    } catch (PDOException $e) {
        exit("" . $e->getMessage());
        }

    ?>

</body>
</html>
<?php

include "landing.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // SELECT pour récupérer le titre 

    $requete = "SELECT * FROM `title`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        $titre = $value["titre"];
    } 
    
    $requete = "SELECT * FROM `metadescription`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        $description = $value["description"];
    } 
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content= <?php echo $description; ?>>
    <link rel='stylesheet' href='style.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Benne&display=swap" rel="stylesheet">
    <title><?php echo $titre; ?></title>
</head>

<body>

<div class="connexion">
    <form action="login.php" method="post">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" class='btn' value="VALIDER">
    </form>
</div>

<?php

    // SELECT pour afficher la couleur du fond et l'appliquer

    $requete = "SELECT * FROM `bgcolor`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<style>body{background-color:" . $value['color'] . ";}</style>";
    }

    // SELECT pour afficher la couleur du texte et l'appliquer

    $requete = "SELECT * FROM `textcolor`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<style>body{color:" . $value['color'] . ";}</style>";
    }

    // SELECT pour afficher les phrases

    $requete = "SELECT * FROM `presentation`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    foreach($resultat as $key => $value){
        echo "<div class='phrases'>" . $value['phrase1'] . "</br>";
        echo $value['phrase2'] . "</br>";
        echo $value['phrase3'] . "</div>";
    }

    // SELECT pour afficher tous les liens 

    $requete = "SELECT * FROM `liens`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    echo "<div class='liens'>";
    foreach($resultat as $key => $value){
        if($value['lien'] != NULL){
            echo "<a href='" . $value['lien'] . "'><img src='" . $value['icone'] . "' width=40px></a>";
        } else{

        }
    }    
    echo "</div>";

} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}


?>

</body>
</html>
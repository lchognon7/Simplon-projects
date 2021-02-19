<?php

include "session-init.php";

if(!isset($_SESSION['token'])){
    header('Refresh:2; url=index.php');
    echo 'La session n\'est pas bonne, vous allez être redirigé vers l\'accueil. </br> Veuillez vous identifier pour accéder à la page admin.';
    exit;
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='styleadmin.css'>
    <title>Admin</title>
</head>
<body>
    <?php


include "landing.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Affficher la phrase d'accueil et renvoyer vers update.php pour script de modification

    $requete = "SELECT * FROM `presentation`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    echo "<div class='presentation-btn'><form method='POST'><input type='submit' name='gerer_phrase' value='Gérer ma présentation'></form></div>";

    if(isset($_POST['gerer_phrase'])){
    foreach($resultat as $key => $value){
        echo "<div class='presentation><form action='update.php' method='POST'><input type='text' name='phrase1' value='" . htmlentities($value['phrase1'], ENT_QUOTES) . "'>";
        echo "<input type='text' name='phrase2' value='" . htmlentities($value['phrase2'], ENT_QUOTES) . "'>";
        echo "<input type='text' name='phrase3' value='" . htmlentities($value['phrase3'], ENT_QUOTES) . "'></br>";
        echo "<input type='submit' class='submit_phrase'value=''></form></br>";
        echo "</div>";
    }
}
else{

}


    // Afficher et modifier la couleur du background en renvoyant vers updatecolor.php

    echo "<div class='bgcolor-btn'><form method='POST'><input type='submit' name='gerer_bg' value='Gérer mon background'></form></div>";

    $requete = "SELECT * FROM `bgcolor`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    if(isset($_POST['gerer_bg'])){
    foreach($resultat as $key => $value){
        echo "<div class='bgcolor'><form action='updatecolor.php' method='POST'><input type='color' name='bgcolor' value='" . $value['color'] . "'></br>";
        echo "<input type='submit' class='submit_bg' value=''></form>";
    }
} 
else{

}

    echo "</div>";

    // Afficher et modifier la couleur du texte en renvoyant vers updatecolortext.php

    echo "<div class='textcolor-btn'><form method='POST'><input type='submit' name='gerer_color' value='Gérer la couleur du texte'></form></div>";


    $requete = "SELECT * FROM `textcolor`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    if(isset($_POST['gerer_color'])){
    foreach($resultat as $key => $value){
        echo "<div class='textcolor'><form action='updatecolortext.php' method='POST'><input type='color' name='textcolor' value='" . $value['color'] . "'></br>";
        echo "<input type='submit' class='submit_color' value=''></form></br>";
    }
    } else{

    }

    echo "</div>";  

    // Ajouter, modifier ou supprimer un lien
    // input qui sert à dérouler la liste des liens 

    echo "<div class='liens-btn'><form method='POST'><input type='submit' name='gerer_liens' value='Gérer mes liens'></form></div>";

    // affichage de tous les liens (existants ou non)

    $requete = "SELECT * FROM `liens`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    // Si le bouton "gérer mes liens" est cliqué, on affiche tous les liens avec leur bouton modifier ou supprimer

    if(isset($_POST['gerer_liens'])){
        echo "<div class='liens'>";
    foreach($resultat as $key => $value){
        echo "<img src='" . $value['icone'] . "' width=40px>";
        echo "<form action='updateliens.php' method='POST'><input type='text' name='lien' value='" . $value['lien'] . "'>";
        echo "<input type='text' name='id_lien' hidden value='" . $value['id_lien'] . "'>";
        echo "<input type='submit' name ='supprimer' class='submit_suppr' value=''>";
        echo "<input type='submit' class='submit_liens' value=''></form>";
    }
    echo "</div>";
    } else{

    } 

    
    // Afficher le titre et renvoie vers updatetitre.php pour modif

    echo "<div class='titre-btn'><form method='POST'><input type='submit' name='gerer_titre' value='Gérer mon titre'></form></div>";

    $requete = "SELECT * FROM `title`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    if(isset($_POST['gerer_titre'])){
    foreach($resultat as $key => $value){
        echo "<div class='titre'><form action='updatetitre.php' method='POST'><input type='text' name='titre' value='" . htmlentities($value['titre'], ENT_QUOTES) . "'></br>";
        echo "<input type='submit' class='submit_titre' value=''></form></br>";
    }
    } else{

    }

    echo "</div>";

    // Affiche la metadescription et renvoie vers updatedesc.php pour modif 
 
    echo "<div class='description-btn'><form method='POST'><input type='submit' name='gerer_desc' value='Gérer ma description'></form></div>";

    $requete = "SELECT * FROM `metadescription`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array());
    $resultat = $prepare->fetchAll();

    if(isset($_POST['gerer_desc'])){
    foreach($resultat as $key => $value){
        echo "<div class='description'><form action='updatedesc.php' method='POST'><input type='text' name='description' value='" . htmlentities($value['description'], ENT_QUOTES) . "'></br>";
        echo "<input type='submit' class='submit_desc' value=''></form></br>";
    }
    } else{

    }

    echo "</div>";

} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

    ?>
<div class="boutons">
    <form action="logout.php">
        <input type="submit" value="Déconnexion">
    </form>
    <form action="index.php">
        <input type="submit" value="Accueil">
    </form>
</div>
</body>
</html>
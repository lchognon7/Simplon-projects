<?php

include "mediatheque.dbconf.php";


$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);


$titreFilm = $_POST['liste_titre'];


$requete = "SELECT * FROM `films` WHERE `titre`= '$titreFilm'";
$prepare = $connexion->prepare($requete);
$prepare->execute();
$resultat = $prepare->fetchAll();

foreach($resultat as $key => $value){
    echo "<form action='update.php' method='post'><label for='modif_titre'>Titre </label><input type='text' name='modif_titre' value='" . $value['titre'] . "'></br></br>";
    echo "<label for='modif_realisateur'>Réalisateur </label><input type='text' name='modif_realisateur' value='" . $value['realisateur'] . "'></br></br>";
    echo "<label for='modif_acteur'>Acteur </label><input type='text' name='modif_acteurs' value='" . $value['acteurs'] . "'></br></br>";
    echo "<label for='modif_date'>Date </label><input type='date' name='modif_date' value='" . $value['date'] . "'></br></br>";
    echo "<label for='modif_synopsis'>Synopsis </label><input type='text' name='modif_synopsis' value='" . $value['synopsis'] . "'></br></br>";
    echo "<label for='modif_affiche'>Affiche </label><input type='text' name='modif_affiche' value='" . $value['affiche'] . "'></br></br>";
    echo "<input type='text' name='id_film' value='" . $value['id_film'] . "' hidden></br><input type='submit' value='Modifier'></form>";
}

?>
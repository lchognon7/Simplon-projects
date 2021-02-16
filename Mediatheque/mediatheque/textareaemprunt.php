<?php

include "mediatheque.dbconf.php";


$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);


$titreFilm = $_POST['liste_titre'];


$requete = "SELECT * FROM `films` WHERE `titre`= '$titreFilm'";
$prepare = $connexion->prepare($requete);
$prepare->execute();
$resultat = $prepare->fetchAll();

foreach($resultat as $key => $value){
    echo "<form action='updatedates.php' method='post'><label for='modif_titre'>Titre </label><input type='text' name='modif_titre' value='" . $value['titre'] . "'></br></br>";
    echo "<label for='emprunt'>Date d'emprunt </label><input type='date' name='emprunt' value='" . $value['date_sortie'] . "'></br></br>";
    echo "<label for='retour'>Date de retour </label><input type='date' name='retour' value='" . $value['date_entree'] . "'></br></br>";
    echo "<input type='text' name='id_film' value='" . $value['id_film'] . "' hidden></br><input type='submit' value='Modifier'></form>";
}

?>
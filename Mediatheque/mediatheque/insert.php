<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // INSERT pour insérer les films dans la BDD

    $titre = strip_tags($_POST['titre']);
    $realisateur = strip_tags($_POST['realisateur']);
    $acteur = strip_tags($_POST['acteur']);
    $sortie = strip_tags($_POST['sortie']);
    $synopsis = strip_tags($_POST['synopsis']);
    $affiche = strip_tags($_POST['affiche']);

    $requete = "INSERT INTO `films` (`titre`, `realisateur`, `acteurs`, `sortie`, `synopsis`, `affiche`)
                VALUES (:titre, :realisateur, :acteur, :sortie, :synopsis, :affiche);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
    ":titre" => $titre,
    ":realisateur" => $realisateur,
    ":acteur" => $acteur,
    ":sortie" => $sortie,
    ":synopsis" => $synopsis,
    ":affiche" => $affiche
    ));
    $resultat = $prepare->rowCount();

if($resultat = 1){
    echo "Le film " . $titre . " a bien été ajouté.";
}
else{
    echo "Une erreur s'est produite.";
}

echo "<form action='index.php'>
<input type='submit' class='bouton' value='ACCUEIL'>
</form>";

} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}


?>
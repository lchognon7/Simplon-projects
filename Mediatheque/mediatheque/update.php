<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $modif_titre = $_POST['modif_titre'];
    $modif_realisateur = $_POST['modif_realisateur'];
    $modif_acteurs = $_POST['modif_acteurs'];
    $modif_date = $_POST['modif_date'];
    $modif_synopsis = $_POST['modif_synopsis'];
    $modif_affiche = $_POST['modif_affiche'];
    $id_film = $_POST['id_film'];

    $requete = "UPDATE `films`
                SET `titre` = :modif_titre, `realisateur` = :modif_realisateur, 
                `acteurs` = :modif_acteurs, `sortie` = :modif_date, `synopsis` = :modif_synopsis, `affiche` = :modif_affiche
                WHERE `id_film` = $id_film";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":modif_titre"   => $modif_titre,
      ":modif_realisateur" => $modif_realisateur,
      ":modif_acteurs" => $modif_acteurs,
      ":modif_date" => $modif_date,
      ":modif_synopsis" => $modif_synopsis,
      ":modif_affiche" => $modif_affiche
    ));
    $resultat = $prepare->rowCount();

    if($resultat = 1){
      echo "Le film " . $titre . " a bien été modifié.";
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
<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $modif_emprunt = $_POST['emprunt'];
    $modif_retour = $_POST['retour'];
    $id_film = $_POST['id_film'];

    if($modif_emprunt != NULL){
    $requete = "UPDATE `films`
                SET `date_sortie` = :emprunt
                WHERE `id_film` = $id_film";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":emprunt"   => $modif_emprunt
    ));
    $resultat = $prepare->rowCount();
  } else {

  }

  if($modif_retour != NULL){
    $requete = "UPDATE `films`
                SET `date_entree` = :retour
                WHERE `id_film` = $id_film";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":retour" => $modif_retour
    ));
    $resultat = $prepare->rowCount();
  } else {

  }  


    if($resultat = 1){
      echo "Une date d'emprunt ou de retour a bien été ajoutée.";
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
<?php

include "mediatheque.dbconf.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $titre_film = $_POST['liste_titre'];

    $requete = "DELETE FROM `films`
                WHERE `titre` = :titre";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
      ":titre"   => $titre_film
    ));
    $resultat = $prepare->rowCount();
    print_r([$requete, $resultat]); 

  
  echo "<form action='index.php'>
  <input type='submit' class='bouton' value='ACCUEIL'>
  </form>";

} catch (PDOException $e) {
    exit("CPT" . $e->getMessage());

}

?>
<?php

// J'ai pas fini

include "recette-facile.dbconf.php";


$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

echo "<form action='crudrecettesupdate.php' method='POST'>";
$titreRecette = $_POST['update'];
echo "<textarea name='nouveauContenu' id='nouveauContenu'>";

$requete = "SELECT `recette_contenu` FROM `recettes` WHERE `recette_titre`= '$titreRecette'";
$prepare = $connexion->prepare($requete);
$prepare->execute();
$resultat = $prepare->fetchAll();
print_r($resultat);
   
echo "</textarea>";
echo "<textarea name='titreRecette' id='titreRecette' hidden>" . $titreRecette . "</textarea>";
echo "</br></br><input type='submit' value='Modifier'>";
echo "</form>";


?>
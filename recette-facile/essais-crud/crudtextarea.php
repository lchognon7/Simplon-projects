<?php

// J'ai pas fini

include "recette-facile.dbconf.php";

$connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

echo "<form action='crudrecettesupdate.php' method='POST'>
    <textarea name='nouveauTitre' id='nouveauTitre'>" . $_POST['update'] . "</textarea>";


?>
<?php
  define("PAGE_TITLE", "Traitement");
  require("inc/inc.kickstart.php");
?>

<main class="pays-creer">
<?php

// requête préparée pour éviter les injections sql

try{

    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE . ";charset=utf8mb4", DB_USERNAME, DB_PASSWORD, $pdo_options);

    $requete = "INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`)
                VALUES (:country_name, :country_flag, :country_capital, :country_area);";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
    ":country_name" => $_POST['country_name'],
    ":country_flag" => $_POST['country_flag'],
    ":country_capital" => $_POST['country_capital'],
    ":country_area" => $_POST['country_area']
    ));
    $resultat = $prepare->rowCount();
  
  // Pas bien du tout sans préparer :O !!! => $requete = "INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`) VALUES ('" . $_POST["country_name"] . "', '" . $_POST["country_flag"] . "', '" . $_POST["country_capital"] . "', '" . $_POST["country_area"] . "')";
  

  // htmlentities pour l'affichage sans l'execution de vilains scripts

  echo "<h3>Merci !</h3>";
  echo "<p>Voici un récapitulatif de votre contribution :</p>";
  echo "<ul>"
      ."<li>Nom du pays : " . htmlentities($_POST["country_name"], ENT_QUOTES) . "</li>"
      ."<li>Capitale du pays : " . htmlentities($_POST["country_capital"], ENT_QUOTES) . "</li>"
      ."<li>Drapeau du pays : " . htmlentities($_POST["country_flag"], ENT_QUOTES) . "</li>"
      ."<li>Superficie du pays (en km²) : " . htmlentities($_POST["country_area"], ENT_QUOTES) . "</li>"
      ."<ul>";
  echo "<a href='page-pays-liste-alpha.php'><button>Consulter la liste des pays</button></a>";

}catch (PDOException $e) {
    exit("" . $e->getMessage());
}



?>
</main>

<?php require("inc/inc.footer.php"); ?>
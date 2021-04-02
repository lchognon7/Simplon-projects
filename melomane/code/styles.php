<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style_tab.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet"> 
  </head>
<body>

<?php

// j'inclue les éléments de connexion à la bdd et le fichier de class

  include "melomane.dbconf.php";
  include "requetes.class.php";
  
  // lecture de la table styles pour afficher les styles dans la liste déroulante
  $req = new Requete();
  $resultat = $req->read('styles'); ?>
?>
  <!-- header -->
  <div class="nav">
              <a href="index.php">→ Accueil</a>
              <a href="styles.php">→ Styles</a>
              <a href="genres.php">→ Genres</a>
              <a href="artists.php">→ Artistes</a>
  </div>

  <!-- barre de recherche par style -->

  <div class="recherche">
      <form action="recherche.php" method="POST">
          <label for="style_recherche">Rechercher des artistes par style</label>
          <select name="style_recherche">
          <?php foreach($resultat as $style): ?>
                  <option value="<?= htmlentities($style['style_name']); ?>"><?= htmlentities($style['style_name']); ?></option>
              <?php endForeach; ?>
          </select>
          <input type="submit" name="recherche" value="🔍">
      </form>
  </div>

  <div class="titre">
    Tous les styles
  </div>

  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <!-- en tête du tableau -->
        <th scope="col"></th>
        <th scope="col">Style</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>

  <?php

  // j'instancie un nouvel objet de Requete 
  // J'utilise la méthode read créée dans requetes.class.php

  $req = new Requete();
  $resultat = $req->read('styles');

// j'initialise $i à 0 pour numéroter mes entrées de tableau

  $i = 1;

  // Boucle foreach pour afficher tous les éléments récupérés dans un tableau bootstrap

  foreach($resultat as $style): ?>

      <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= htmlentities($style['style_name']); ?></td>
        <td>
            <form method="POST" action ="update.php">
              <!-- input caché pour récupérer l'id -->
              <input type="text" hidden value="<?= $style['style_id'] ?>" name='style_id'>
              <!-- input caché pour récupérer et afficher le nom du style dans update.php -->
              <input type="text" hidden name="modif" value="<?= $style['style_name']; ?>">
              <input type="submit" class='update' name="update_styles" value="✏️">
            </form>
        </td>
        <td>
            <!-- form lié au bouton de suppression -->
            <form method="POST">
                <input type="text" hidden value="<?= $style['style_id'] ?>" name='style_id'>
                <input type="submit" class='delete' name="delete" value="🗑">
            </form>
        </td>
      </tr>

      <?php $i++;
      
  endForeach; 

  // si le bouton supprimer est cliqué, on instancie un objet de la classe Requete et on passe la méthode delete

  if(isset($_POST['delete'])){
      $req = new Requete();
      $resultat = $req->delete('styles', 'style_id', $_POST['style_id']);
  }

  ?>


  </tbody>
  </table>

</body>
</html>
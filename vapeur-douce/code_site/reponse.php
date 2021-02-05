<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Résultat de votre recherche</title>
</head>
<body>

<?php

// fonction pour sécuriser les entrées utilisateurs 

function securite($donnees){
    $donnees = stripslashes($donnees);                      // supprimes les antislash pour éviter que l'utilisateur échappe les caractères spéciaux
    $donnees = htmlspecialchars($donnees);                  // echappe les caractères spéciaux type chevrons ...
    $donnees = str_replace(' ', '+', $donnees);             // remplace les espaces et tirets par un +
    $donnees = str_replace('-', '+', $donnees);
    $donnees = str_replace(' - ', '+', $donnees);
    $donnees = str_replace(' -', '+', $donnees);
    $donnees = str_replace('- ', '+', $donnees);
    $donnees = strtolower($donnees);                        // Transforme tout en minuscule
    $donnees = ucfirst($donnees);                           // Transforme en majuscule la première lettre de la chaîne de caractères
    return $donnees;
}

// On applique la fonction créée aux données qu'on récupère dans $ingredient

$ingredient = securite(($_POST['rechercher']));

$curl = curl_init();

// On donne des options pour la transmission curl pour éviter les erreurs

curl_setopt_array($curl, [                                  // paramétrage de la session curl
    CURLOPT_URL => "https://api.hmz.tf/?id=$ingredient",    //récupèration de l'url de l'api
    CURLOPT_RETURNTRANSFER => true,                         // retourne une chaine de caractère
    //CURLOPT_TIMEOUT => 2,                                 // durée laissée au serveur pour répondre
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,          // force la version d'http en 1.1

]);

// On vérifie si data = false => si c'est false c'est qu'il y a une erreur

$data =curl_exec($curl);                                    // execute ce qu'on a initié dans la transmission curl (booléen)
if($data===false){                                          // On vérifie l'erreur
    var_dump(curl_error($curl));
    }
    else{                                                   // Sinon on exécute le code suivant
$data = json_decode($data,true);                            // On décode le json
$nom = $data ['message']['nom'];                            // Récupération des données dans le tableau json
$cuisson = $data ['message']['vapeur']['cuisson'];
$cuisson = str_replace('min', ' ', $cuisson);               // On remplace 'min' par du vide pour pouvoir donner ensuite une autre couleur à minutes (possible du fait que toutes les durées sont exprimées en minutes)
$statut = $data ['status'];

      
    } 

// On ferme la session curl ce qui permet de libérer de la mémoire

curl_close($curl); 

// Je vérifie si ce mot existe dans le tableau json et si 'success' => on peut afficher les données qui ont été stockées dans des variables au préalable

if($statut == 'success'){
?>
<div class="enfant1"><h1>TEMPS DE CUISSON À LA VAPEUR : <span class="ingredient"><?php echo $nom; ?></span></h1></div> 
<div class="enfant2"><p><span class="beige">•</span>•<span class="beige">•</span></p></div>
<div class="enfant3"><p><?php echo $cuisson; ?><span class="beige">minutes</span></p>
<?php
}
else{                                                       // Si 'error' on affiche : Hélas ...
    echo '<div class="erreur"><span class="beige">Hélas</span>, je ne connais pas cet id :(</div>';
}
?></div>

<div class="enfant4">                                       <!-- div bouton submit -->
    <form action="index.php">
    <input type="submit" class="bouton" value="ACCUEIL">
    <input type="submit" class="bouton_mobile" value="">
</form>
</div>
<div class="enfant5">                                        <!-- div image minuteur -->
<img src="tomate.png" alt="Minuteur en forme de tomate">
</div>

<div class="enfant6">                                       <!-- div trempage et niveau d'eau -->

<?php

// Afficher le trempage et le niveau d'eau en vérifiant si ces clés existent dans le tableau
// Sinon ne rien afficher

if(array_key_exists('trempage', $data['message']['vapeur'])){
    echo '<p>Quelques conseils :</br></br> Trempage : ' . $data['message']['vapeur']['trempage'] . '</p>';
}
else{
    echo '<p>Quelques conseils:</br> Aucun trempage n\'est nécessaire.</p>';
}

if(array_key_exists('niveau d\'eau', $data['message']['vapeur'])){
    echo '<p>Niveau d\'eau : ' . $data['message']['vapeur']['niveau d\'eau'] . '</p>';
}
else{

}
?>
</div>

</body>
</html>
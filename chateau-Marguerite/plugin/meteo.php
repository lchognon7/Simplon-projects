<?php

/*
Plugin Name: Météo Prévenchères
Description: La météo de Prévenchères en direct
Author: Lindsay

*/

function SWP_meteo_btn() {

$curl = curl_init('http://api.openweathermap.org/data/2.5/weather?q=pr%C3%A9vench%C3%A8res&APPID=ac638100dfb08f1f50f483df7b819164');

// On transmet des options pour la transmission curl sinon ça peut sortir une erreur
// Va indiquer à curl de ne pas vérifier les connexions (désactiver la vérification SSL)
// setopt se trouve juste avant l'execution

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Retourne en chaîne de caractères

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Exécuter ce qu'on a mis en curl_init (renvoie vrai ou faux)

$data = curl_exec($curl);

// On vérifie si data = false => si c'est false c'est qu'il y a une erreur
// On va vérifier cette erreur

if($data === false){
    var_dump(curl_error($curl));
}
else{
    $data = json_decode($data, true);
    $weather = $data['weather'][0]['main'];
        switch($weather){
            case 'Clear':
            echo "A Prévenchères, il fait soleil. <img src = 'soleil.png'/>";
            break;
    
            case 'Thunderstorm':
            echo "A Prévenchères, il y a de l'orage. <img src = 'orage.png'/>";
            break;
    
            case 'Drizzle':
            echo "A Prévenchères, il pleut un peu. <img src = 'petitepluie.png'/>";
            break;
    
            case 'Rain':
            echo "A Prévenchères, il pleut. <img src = 'pluie.png'/>";
            break;
    
            case 'Snow':
            echo "A Prévenchères, il neige. <img src = 'snow.png'/>";
            break;
    
            case 'Clouds':
            echo "A Prévenchères, il y a des nuages. <img src = 'nuage.png'/>";
            break;
    }
    
}

// On ferme la session ce qui permet de libérer la mémoire 

curl_close($curl);

}

add_action( 'wp_footer', 'SWP_meteo_btn' );


?>
<?php

/*
Plugin Name: Météo Prévenchères
Description: La météo de Prévenchères en direct
Author: Lindsay

*/
function SWP_meteo_btn() {

$url = 'http://api.openweathermap.org/data/2.5/weather?q=pr%C3%A9vench%C3%A8res&APPID=ac638100dfb08f1f50f483df7b819164';

$contenu = file_get_contents($url);

$json = json_decode($contenu);

$name = $json->name;


$weather = $json->weather[0]->main;
$icone = $json->weather[0]->icon;

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

add_action( 'wp_footer', 'SWP_meteo_btn' );
?>

           
   
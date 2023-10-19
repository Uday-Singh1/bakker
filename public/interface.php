<?php
//handle inkomende aanvraag
//controleer de URL, is er misschien een categorie geselecteerd?
$url = explode('/', trim($_SERVER['REQUEST_URI']));
// verwijder lege waarden
$url = array_values(array_filter($url));
// en stel een standaardwaarde in
if (empty($url[0])) {
    $url[] = 'home';
}

//handle inkomende aanvraag
//controleer de URL, is er misschien een categorie geselecteerd?
$url = explode('/', trim($_SERVER['REQUEST_URI']));
// verwijder lege waarden
$url = array_values(array_filter($url));
// en stel een standaardwaarde in
if (empty($url[0])) {
    $url[] = 'detail';
}

var_dump($url);

ob_start(); // Begin met het bufferen van uitvoer

// Inclusie van de pagina's in variabelen
ob_start();

// Hier kun je de URL aanpassen naar 'details/appeltaart'
if ($url[0] === 'details' && !empty($url[1])) {
    require('./detail.php');
} else {
    require('../views/home.php');
}

$homeContent = ob_get_clean();

ob_start();
require('../views/producten.php');
$productenContent = ob_get_clean();

ob_end_clean(); // Stop met bufferen van uitvoer

// Toon de inhoud van de pagina's waar je dat wilt
echo $homeContent;
echo $productenContent;
?>

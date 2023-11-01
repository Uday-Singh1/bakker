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


// Hier kun je de URL aanpassen naar 'details/appeltaart'
if ($url[0] === 'details' && !empty($url[1])) {
    require('./detail.php');
} else {
    require('../views/home.php');
}




require('../views/producten.php');



// Toon de inhoud van de pagina's waar je dat wilt
echo $homeContent;
echo $productenContent;


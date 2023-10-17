<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js" defer></script>
    <title>Bakker</title>
</head>
<body>
    <header>
        <!-- Inclusief database.php -->
    
    </header>



<!-- Inclusief het gebak.php bestand om de gegevens weer te geven -->
<?php 


// handle incomming request
// controleer de url, is er misschien een categorie geselecteerd?
// $url = explode('/', trim($_SERVER['REQUEST_URI']));
// // remove empty values 
// $url = array_values(array_filter($url));
// // and set a default
// if (empty($url[0])) {
//     $url[] = 'home';
// }
// var_dump($url);
    require('../views/home.php');
    require('./producten.php');
    // require('./gebak.php');
    
?>
    
</body>
</html>

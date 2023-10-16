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

    <h1>Welkom op mijn Gebakpagina</h1>

<!-- Inclusief het gebak.php bestand om de gegevens weer te geven -->
<?php 
    require('./gebak.php');
    require('./producten.php');
?>
    
</body>
</html>

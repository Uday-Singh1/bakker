<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

$url = explode('/', trim($_SERVER['REQUEST_URI']));
// verwijder lege waarden
$url = array_values(array_filter($url));
// en stel een standaardwaarde in
if (empty($url[0])) {
    $url[] = 'home';
}
    require('./_index.php');
    
    ?>

</body>
</html>




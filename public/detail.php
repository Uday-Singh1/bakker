<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Productdetails</title>
</head>
<body>
<?php
require('../database.php');

// Haal de URL op
$request_uri = $_SERVER['REQUEST_URI'];
// Splits de URL in delen op basis van /
$parts = explode('/', $request_uri);
// Verwijder lege delen
$parts = array_values(array_filter($parts));

if (count($parts) > 1) {
    // De URL bevat een slug, bijv. "detail.php/appeltaart"
    $slug = $parts[1];
    $sql = "SELECT id, title, intro, `desc` FROM product WHERE slug = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<h1>' . $row['title'] . '</h1>';
        echo '<p>' . $row['intro'] . '</p>';
        echo '<p>' . $row['desc'] . '</p>';
    } else {
        echo "Product niet gevonden.";
    }
    $stmt->close();
} else {
    echo "Ongeldige productpagina.";
}

$con->close();
?>


</body>
</html>

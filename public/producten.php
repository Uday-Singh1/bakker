<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Producten</title>
</head>
<body>
    <h1>Onze Producten</h1>

    <?php
require('../database.php');

$sql = "SELECT id, title, slug, intro, `desc` FROM product";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<a href="detail.php/' . $row['slug'] . '">';

        echo '<img class="product-image" src="product' . $row['id'] . '.jpg" alt="' . $row['title'] . '">';
        echo '</a>';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<p>' . $row['intro'] . '</p>';
        echo '</div>';
    }
} else {
    echo "Geen productgegevens gevonden.";
}

$con->close();
?>




</body>
</html>

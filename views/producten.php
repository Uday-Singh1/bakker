<h1>Onze Producten</h1>

<style>
<?php include '../public/css/style.css'; ?>
</style>

<div class="product-container">
    <?php

//handle inkomende aanvraag
//controleer de URL, is er misschien een categorie geselecteerd?
$url = explode('/', trim($_SERVER['REQUEST_URI']));
// verwijder lege waarden
$url = array_values(array_filter($url));
// en stel een standaardwaarde in
if (empty($url[0])) {
    $url[] = 'detail';
}

    require('../database.php');

    $sql = "SELECT id, title, slug, intro, `desc`, image FROM product";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            /* echo '<a href="details?slug=' . $row['slug'] . '">'; */
                
            echo '<a href="detail.php?slug=' . $row['slug'] . '">';

            $imageData = $row['image'];
            $imageBase64 = base64_encode($imageData);
            $imageMimeType = 'image/jpeg';

            echo '<img class="product-image" src="data:' . $imageMimeType . ';base64,' . $imageBase64 . '" alt="' . $row['title'] . '">';
            echo '</a>';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p class="product-intro">' . $row['intro'] . '</p>'; // Voeg de klasse "product-intro" toe
            echo '<p class="product-desc">' . $row['desc'] . '</p>'; // Voeg de klasse "product-desc" toe
            echo '</div>';
        }
    } else {
        echo "Geen productgegevens gevonden.";
    }

    $con->close();
    ?>
</div>
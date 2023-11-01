<style>
<?php include '../public/css/style.css'; ?>
</style>

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

var_dump($url);

// Open de <main> tag hier
echo '<main class="main__detail">';

if (isset($_GET['slug'])) {
 $slug = $_GET['slug'];
 require('../database.php');

 $sql = "SELECT id, title, intro, `desc`, image FROM product WHERE slug = '$slug'";
 $result = $con->query($sql);

 if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo '<a class="home__button" href="home">Terug naar Home</a>'; // Terugknop

  echo '<h1>' . $row['title'] . '</h1>';

  // De 'image' kolom bevat BLOB-gegevens, converteer deze naar een afbeelding
      $imageData = $row['image'];
      $imageBase64 = base64_encode($imageData);
      $imageMimeType = 'image/jpeg'; // Pas dit aan naar het juiste MIME-type
        
      echo '<img class="product-image-new" src="data:' . $imageMimeType . ';base64,' . $imageBase64 . '" alt="' . $row['title'] . '">';
        
      echo '<p class="custom-intro">' . $row['intro'] . '</p>'; // Geef een andere klasse "custom-intro"
      echo '<p class="custom-desc">' . $row['desc'] . '</p>'; // Geef een andere klasse "custom-desc"
        // Voeg hier andere details toe die je wilt weergeven
    } else {
        echo "Product niet gevonden";
    }

    $con->close();
} else {
    echo "Ongeldige URL voor detailpagina";
}

// Sluit de <main> tag hier
echo '</main>'; 
?>

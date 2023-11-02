

<link rel="stylesheet" href="../public/css/style.css">


<?php



//  require('./css/style.css');


// Open de <main> tag hier
echo '<main class="main__detail">';
echo '<a class="home__button" href="/">Terug naar Home</a>'; // Terugknop

if (defined('SLUG')) {
 $slug = SLUG;
 require('../database.php');

 $sql = "SELECT id, title, intro, `desc`, image FROM product WHERE slug = '$slug'";
 $result = $con->query($sql);

 if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  echo '<h1 class="detail__h1">' . $row['title'] . '</h1>';

  // De 'image' kolom bevat BLOB-gegevens, converteer deze naar een afbeelding
      $imageData = $row['image'];
      $imageBase64 = base64_encode($imageData);
      $imageMimeType = 'image/jpeg'; // Pas dit aan naar het juiste MIME-type
        
      echo '<img class="product-image-new" src="data:' . $imageMimeType . ';base64,' . $imageBase64 . '" alt="' . $row['title'] . '">';
        
      echo '<p class="detail-intro">' . $row['intro'] . '</p>'; // Geef een andere klasse "custom-intro"
      echo '<p class="detail-desc">' . $row['desc'] . '</p>'; // Geef een andere klasse "custom-desc"
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

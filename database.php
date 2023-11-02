<?php

$con = new mysqli('mariadb', 'exampleuser', 'examplepass', 'bakker' , 3306);

if ($con->connect_error) {
    die("Database connectie mislukt: " . $con->connect_error);
}

<?php

// PHP settings
$host = "localhost";
$user = "root";
$pass = "";
$db = "Millhouse_blog";


// Try (MAKE CONNECTION)
try {
    $dsn = "mysql:host=$host;dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);

// ON ERROR
} catch (PDOException $e) {
    // Hämtar felmeddelande från PDO
    echo "Error!" . $e->getMessage() . "<br>";
    die;
}

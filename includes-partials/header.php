<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (empty($title)) {
            echo "Millhouse | Home";
        } else {
            echo $title;
        }
        ?>
    </title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Josefin+Sans&display=swap" rel="stylesheet"> 
    <script src="js/app.js" defer></script>
	<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>

</head>

<body>
    <h1 class="header">MILLHOUSE</h1>
    <a href="index.php?page=home">Start</a> | 
    <a href="index.php?page=signup">Registrera</a> | 
    <a href="index.php?page=login">Logga in</a>

    <?php 
    // -- ADMIN MENY -- // 

    if(@$_SESSION['IsAdmin'] == true){
        echo ' | <a href="index.php?page=create">Skapa inlägg</a>';
        echo ' | <a href="index.php?page=admin">Admin-sida</a>';
    }
    
    ?>
    <hr>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (empty($title)) {
            echo "Min sida!";
        } else {
            echo $title;;
        }
        ?>
    </title>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <h1>Startsida</h1>
<a href="views/home.php?page=home">Start</a> | <a href="index.php?page=signup">Registrera</a> | <a href="index.php?page=login">Logga in</a> | <a href="index.php?page=create">Skapa inlägg</a> | <a href="views/edit-blogpost.php">Redigera inlägg</a>
<hr>
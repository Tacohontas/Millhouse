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
<a href="index.php">Start</a> | <a href="signup.php">Registrera</a> | <a href="login.php">Logga in</a> | <a href="create-blogpost.php">Skapa inlägg</a> | <a href="edit-blogpost.php">Redigera inlägg</a>
<hr>
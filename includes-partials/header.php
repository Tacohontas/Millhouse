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
    <script src="js/main.js" defer></script>
</head>

<body>

    <header class="header">
    <h1 class="logo-text">MILLHOUSE</h1>
        <nav class="header-nav">
            <ul class="header-nav_links">
                <li>
                    <a href="index.php?page=home">Hem </a>|
                </li>
                <li>
                    <a href="index.php?page=signup">Registrera </a>|
                </li>
                <li>
                    <a href="index.php?page=login">Logga in </a>
                </li>
                <?php
                // -- ADMIN MENY -- // 

                if (@$_SESSION['IsAdmin'] == true) {
                    echo '  <li>|<a href="index.php?page=create"> Skapa inlägg </a></li>';
                    echo '  <li>|<a href="index.php?page=admin">  Admin-sida</a></li>';
                }

                ?>
            </ul>

        </nav>

    </header>


    <hr>
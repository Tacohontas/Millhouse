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
    <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
    <script type="text/javascript" src="js/app.js" defer></script>


</head>

<body>

    <header class="header">
        <h1 class="logo-text">MILLHOUSE</h1>
        <nav class="header-nav">
            <ul class="header-nav_links">
                <li>
                    <a href="index.php?page=home">Hem</a>
                </li>

                <li>|</li>

                <?php
                // Admin-nav
                if (@$_SESSION['IsAdmin'] == true) {
                    echo '<li><a href="index.php?page=create">Skapa inlägg</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="index.php?page=admin">Admin-sida</a></li>';
                    echo '<li>|</li>';
                }

                if (isset($_SESSION['Username'])) {
                    echo '<li><a href="index.php?page=search">Sök</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="./handlers/logout.php">Logga ut</a></li>';
                } else {
                    echo '<li><a href="index.php?page=login">Logga in</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="index.php?page=signup">Registrera</a></li>';
                };
                ?>


            </ul>

        </nav>

    </header>

    <?php
    //--- ERROR - Ifall du lämnat tomma fält (redirectad från handle_comments eller handle_posts) ---//

    if (@$_GET['error'] == true) {
        echo "<div class='error_box'><h2>{$_GET['errormessage']}</h2></div>";
    }
    ?>
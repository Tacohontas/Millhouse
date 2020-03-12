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
    <!-- Style -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Josefin+Sans&display=swap" rel="stylesheet">
    <!-- Edit blogpost tool -->
    <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="js/app.js" defer></script>
    <!-- Icones -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>

    <header class="header">
        <a href="index.php?page=home">
            <h1 class="logo-text">MILLHOUSE</h1>
        </a>
        <nav class="header-nav">
            <ul class="header-nav_links">

                <?php
                // --- Om Admin loggar in visas en admin-nav --- //
                if (@$_SESSION['IsAdmin'] == true) {
                    echo '<li><a href="index.php?page=create">Skapa inlägg</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="index.php?page=admin">Admin-sida</a></li>';
                    echo '<li>|</li>';
                }
                // --- Standard nav för inloggad användare --- //
                if (isset($_SESSION['Username'])) {
                    echo '<li><a href="index.php?page=search">Sök</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="./handlers/logout.php">Logga ut</a></li>';
                } else {
                    //--- Ej inloggad kan endast logga in och registrera sig --- //
                    echo '<li><a href="index.php?page=home">Logga in</a></li>';
                    echo '<li>|</li>';
                    echo '<li><a href="index.php?page=signup">Registrera</a></li>';
                };
                ?>
                
            </ul>

        </nav>

    </header>
    <!-- Här öppnas page-container & content-wrap som stängs i footer.php -->
    <div id="page-container"> 
    <div id="content-wrap">

        <?php
        //--- ERROR - Ifall du lämnat tomma fält (redirectad från handle_comments eller handle_posts) ---//
        if (@$_GET['error'] == true) {
            echo "<div class='error_box'><h2>{$_SESSION['error_message']}</h2></div>";
        }
        ?>
<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>

<div class="form">
    <form method="GET" action="./handlers/handle_search.php">
        <input class="input" type="text" name="searchQ" placeholder="Search" required>
        <input class="search" type="submit" value="Sök">
    </form>
</div>
<?php

// --- Om searchQ finns med som GET-variabel visas de blogginlägg som innehåller serachQ ordet --- //
if (!empty($_GET['searchQ'])) {

    echo "<h2 class='title'>Sökresultat</h2>";

    $BlogPosts = new BLOGPOST($dbh);
    $BlogPosts->searchBlogPosts(($_GET['searchQ']));


    if (!empty($BlogPosts->getBlogPosts())) {
        foreach ($BlogPosts->getBlogPosts() as $BlogPost) {
            echo "<div class='blogpost'>";
            echo "<h2 class='heading'>" . $BlogPost['title'] . "</h2>";
            echo $BlogPost['date_posted'];
            if (isset($BlogPost['img'])) {
                echo "<img class='blogpost_img' src='images/{$BlogPost['img']}' alt='Här ska det va en bild' maxheight=800 width=380>";
            };
            echo "<div class='blogpost_content'>" . $BlogPost['content'] . "</div>";
            echo "</div>";
        };
    } else {

        // --- Om ordet inte hittades får du ett error meddelande --- //
        $errorMessages = "Hoppsan! Det finns inga inlägg som innehåller '{$_GET['searchQ']}'.";
        $_SESSION['error_message'] = $errorMessages;
        header("location:./index.php?page=search&error=true");
        die;
    };
} 

?>


<?php
include("./includes-partials/footer.php")
?>
<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>
<?php

@session_start();


if(isset($_SESSION['Username'])){

    //--- Sorterings länkar ---//
    echo  '<div class="sort" > <a class="sort_link" href="index.php?page=home&order=descending">Senaste</a> | <a class="sort_link" href="index.php?page=home&order=ascending"> Äldsta </a></div>';
    echo "<div class='grid-container'>";

    $BlogPosts = new BLOGPOST($dbh);

    //--- Sorterings ---//
    $order = "DESC";
    if(isset($_GET['order']) && $_GET['order'] == "ascending") {
        $order = "ASC";
    }
    
    //--- HÄMTAR ALLA BLOGGINLÄGG ---//
    $BlogPosts->fetchAll('published', $order);

    foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
        
        include("./includes-partials/thumbnail_blogpost.php");
        
    }

    echo "</div>";
} else {
    include("./includes-partials/login_form.php");
}


?>

<?php
include("./includes-partials/footer.php");
?>



<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>
<?php
//--- Visar ett meddelande med den inloggades username från DB + Utloggning---//
@session_start();


if(isset($_SESSION['Username'])){

    echo  'Sortera: <a href="index.php?page=home&order=ascending"> Äldsta</a> <a href="index.php?page=home&order=descending">Nyaste</a>';

    echo "<div class='grid-container'>";

    //--- HÄMTAR ALLA BLOGGINLÄGG ---//
    $BlogPosts = new BLOGPOST($dbh);

    $order = "desc";

    if(isset($_GET['order']) && $_GET['order'] == "ascending") {
        $order = "ASC";
    }

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



<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>
<?php
//--- Visar ett meddelande med den inloggades username från DB + Utloggning---//
@session_start();


if(isset($_SESSION['Username'])){
    echo "<div class='grid-container'>";

    //--- HÄMTAR ALLA BLOGGINLÄGG ---//
    $BlogPosts = new BLOGPOST($dbh);
    $BlogPosts->fetchAll('published');

    foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
        
        include("./includes-partials/thumbnail_blogpost.php");
        
    }

    echo "</div>";
} else {
    echo "<marquee><h1>LOGGA IN TACK!</h1></marquee>";
}


?>

<?php
include("./includes-partials/footer.php");
?>



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
        
        echo "<div class='blogpost_section'>";
        echo "<h2><a href='index.php?page=view&postId=" . $BlogPost['id'] . "'> ".$BlogPost['title']. "</a> </h2>";
        echo"<img src='images/".$BlogPost['img']."' alt='Här ska det va en bild' maxheight=600 width=300>";
       // echo $BlogPost['content'] . "<br>";
       echo $BlogPost['name'] . " | ";
        echo $BlogPost['date_posted'];
        echo "</div>";
        
    }

    echo "</div>";
} else {
    echo "<marquee><h1>LOGGA IN TACK!</h1></marquee>";
}


?>

<?php
include("./includes-partials/footer.php");
?>



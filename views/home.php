<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>
<?php
//--- Visar ett meddelande med den inloggades username från DB + Utloggning---//

@session_start();

if(isset($_SESSION['Username'])){
    echo $_SESSION['Username']." är inloggad!";
    echo "<br>";
    echo '<a href="./handlers/logout.php">Logga ut</a><br>'; 


    //--- HÄMTAR ALLA BLOGGINLÄGG ---//
    $BlogPosts = new BLOGPOST($dbh);
    $BlogPosts->fetchAll();

    foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
        echo "<hr>";
        echo"<a href='index.php?page=view&postId=" . $BlogPost['id'] . "'> ".$BlogPost['title']. "</a> <br />";
        echo"<b> Inlägg: </b>" . $BlogPost['content'] ."<br />";
        echo"<img src='images/".$BlogPost['img']."' alt='Här ska det va en bild' maxheight=300 width=200>" ."<br />";
        echo"<b> Kategori: </b>" . $BlogPost['name'] ."<br />";
        echo"<b> Datum: </b>" . $BlogPost['date_posted'] ."<br />";
        if(isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
        echo "<a href='index.php?page=edit&postId=".$BlogPost['id']."'>Redigera |</a>";
        };
       
    }
} else {
    echo "<marquee><h1>LOGGA IN TACK!</h1></marquee>";
}


?>

<?php
include("./includes-partials/footer.php");
?>
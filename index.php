<?php
include("./includes-partials/start_header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");

$page =(isset($_GET['page']) ? $_GET['page'] : '');

if($page == "signup") {

    include("views/signup.php");

} else if($page == "login") {

    include("views/login.php");

} else if($page == "create") {

    include("views/create-blogpost.php");

} else {

    include("views/home.php");
};


?>

<?php
//--- Visar ett meddelande med den inloggades username från DB + Utloggning---//
session_start();

if(isset($_SESSION['Username'])){
    echo $_SESSION['Username']." är inloggad!";
    echo "<br>";
    echo '<a href="./handlers/logout.php">Logga ut</a>';


    //--- HÄMTAR ALLA BLOGGINLÄGG ---//
    $BlogPosts = new BLOGPOST($dbh);
    $BlogPosts->fetchAll();

    foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
        echo "<hr />";
        echo"<b> Rubrik: </b>" . $BlogPost['title']."<br />";
        echo"<b> Inlägg: </b>" . $BlogPost['content'] ."<br />";
        echo"<b> Kategori: </b>" . $BlogPost['name'] ."<br />";
        echo"<b> Datum: </b>" . $BlogPost['date_posted'] ."<br />";
        echo"<b> Bild: </b>" . "<img src='images/".$BlogPost['img']."' alt='Här ska det va en bild' maxheight=300 width=200>" ."<br />";
    }
} else {
    echo "<marquee><h1>LOGGA IN TACK!</h1></marquee>";
}


?>


<?php
include("./includes-partials/footer.php");
?>
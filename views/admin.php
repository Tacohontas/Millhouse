
<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");

echo "<h1>Adminsidan!</h1>";
echo '<a href="./handlers/logout.php">Logga ut</a>';

$BlogPosts = new BLOGPOST($dbh);
$BlogPosts->fetchAll();

foreach ($BlogPosts->getBlogPosts() as $BlogPost) {
    echo "<hr />";
    echo "<b> Rubrik: </b>" . $BlogPost['title'] . "";
    echo "<b> Datum: </b>" . $BlogPost['date_posted'] . "<br />";
    echo "<a href='index.php?page=view&postId=".$BlogPost['id']."'> Läs inlägg</a><br>";
    echo "<a href='index.php?page=edit&postId=" . $BlogPost['id'] . "'>Redigera</a><br>";
    echo '<a href="./handlers/handle_blogposts.php?action=delete&id=' . $BlogPost['id'] . '">Delete!</a><br>';
    echo '<a href="#">Publicera!</a>';
}


?>


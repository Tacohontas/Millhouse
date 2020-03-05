
<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");

echo "<h1>Adminsidan!</h1>";
echo '<a href="./handlers/logout.php">Logga ut</a>';

$BlogPosts = new BLOGPOST($dbh);
$BlogPosts->fetchAll();

foreach ($BlogPosts->getBlogPosts() as $BlogPost) {
    include("./includes-partials/admin_postmenu.php");
}


?>


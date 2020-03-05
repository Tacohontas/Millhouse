<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>

<div class="postmenu_wrapper">

<div class="postmenu_headings">
    <h2>Post-id</h2>
    <h2>Rubrik</h2>
    <h2>Datum</h2>
    <h2 class="headings__actions">Actions</h2>
</div>




<?php

$BlogPosts = new BLOGPOST($dbh);
$BlogPosts->fetchAll();


foreach ($BlogPosts->getBlogPosts() as $BlogPost) {
    include("./includes-partials/admin_postmenu.php");
}
?>

</div>

<?php
include("./includes-partials/footer.php");

?>
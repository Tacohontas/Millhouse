<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./includes-partials/database_connection.php");
?>

<?php

  //--- HÄMTAR ALLA BLOGGINLÄGG ---//
  $BlogPosts = new BLOGPOST_TEST($dbh);
  $BlogPosts->fetchByPostId($_GET['postId']);

  foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
      
      echo"<b> Rubrik: </b>" . $BlogPost['title']."<br />";
      echo"<b> Inlägg: </b>" . $BlogPost['content'] ."<br />";
      echo"<img src='images/".$BlogPost['img']."' alt='Här ska det va en bild' maxheight=300 width=200>" ."<br />";
      echo"<b> Kategori: </b>" . $BlogPost['name'] ."<br />";
      echo"<b> Datum: </b>" . $BlogPost['date_posted'] ."<br />";
        if(isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
        echo "<a href='index.php?page=edit?postId=".$BlogPost['id']."'>Redigera </a>";
        };
  }


?>

<?php
include("./includes-partials/footer.php");
?>
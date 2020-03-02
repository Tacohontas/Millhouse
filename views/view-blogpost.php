<?php
include("./includes-partials/header.php");
include("./classes/blogposts.php");
include("./classes/comments.php");
include("./includes-partials/database_connection.php");

@session_start();

?>

<?php

//--- ERROR - Ifall du lämnat tomma kommentarsfält (redirectat från handle_comments) ---//
if(@$_GET['error'] == true){
  echo $_GET['errormessage'];

}
echo "<div class='view-container'>";

  //--- HÄMTAR VALT BLOGGINLÄGG ---//
  $BlogPosts = new BLOGPOST($dbh);
  $BlogPosts->fetchByPostId($_GET['postId']);

  foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
      include("./includes-partials/full_blogpost.php");
  };

  echo "</div>";


  //--- Hämtar kommentarer på valt blogginlägget ---// 
  $Comments = new COMMENT($dbh);
  $Comments->fetchCommentByPostID($_GET['postId']);

  foreach( $Comments->getComments() as $Comment) {
    include("./includes-partials/display_comment.php");
    
  };


//--- Lämna en kommentar som inloggad användare ---//
    include("./includes-partials/leave_comment.php");
?>

<?php
include("./includes-partials/footer.php");
?>


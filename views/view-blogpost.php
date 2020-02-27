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

  //--- HÄMTAR VALT BLOGGINLÄGG ---//
  $BlogPosts = new BLOGPOST($dbh);
  $BlogPosts->fetchByPostId($_GET['postId']);

  foreach( $BlogPosts->getBlogPosts() as $BlogPost) {
      
      echo"<b> Rubrik: </b>" . $BlogPost['title']."<br />";
      echo"<b> Inlägg: </b>" . $BlogPost['content'] ."<br />";
      echo"<img src='images/".$BlogPost['img']."' alt='Här ska det va en bild' maxheight=300 width=200>" ."<br />";
      echo"<b> Kategori: </b>" . $BlogPost['name'] ."<br />";
      echo"<b> Datum: </b>" . $BlogPost['date_posted'] ."<br />";
        if(isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
        echo "<a href='index.php?page=edit&postId=".$BlogPost['id']."'>Redigera </a>";
        }
  };


  //--- Hämtar kommentarer på valda blogginlägget ---// 
  $Comments = new COMMENT($dbh);
  $Comments->fetchCommentByPostID($_GET['postId']);

  foreach( $Comments->getComments() as $Comment) {
    echo "<hr />";
    echo $Comment['Content']."<br />";
    echo $Comment['Date_posted']."<br />";
    echo $Comment['Username']." |";
    
    //--- Admin kan radera alla kommentarer + Inloggad använadre kan ta bort sina egna kommentarer---//
     if(isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
    echo '<a href="./handlers/handle_comments.php?action=delete&id=' . $Comment['Id'] .'&postId='.$_GET['postId'].'"> Ta bort</a><br>';
    } else (isset($_SESSION['Username']) && $_SESSION['Username'] == $Comment['Username']) {
        echo '<a href="./handlers/handle_comments.php?action=delete&id=' . $Comment['Id'] .'&postId='.$_GET['postId'].'"> Ta bort</a><br>';
    }
    
  };


//--- Lämna en kommentar som inloggad användare ---//
    echo '<form method="POST" action="./handlers/handle_comments.php">
    <hr />
    <input type="hidden" name="postId" value="' . $_GET['postId'] . '"><br>
    <textarea name="comment" id="" cols="30" rows="5" placeholder="Skriv din kommentar"></textarea><br />
    <input type="hidden" name="userid" value="' . $_SESSION['UsersId'] . '"><br />
    <input type="text" name="username" value="' . $_SESSION['Username'] . '" readonly><br />
    <input type="submit" value="Kommentera">
    </form>';



?>

<?php
include("./includes-partials/footer.php");
?>
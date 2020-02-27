<?php
include("../includes-partials/database_connection.php");


// --- Tar bort inlägg om den hårdkodade GET-variabeln "delete" finns --- //
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $query = "DELETE FROM Comments WHERE Id = :commentsId;";
    $sth = $dbh->prepare($query);
    $commentsId= $_GET['id'];
    $sth->bindParam(':commentsId', $commentsId);
    $return = $sth->execute();

   header("location:../index.php?page=view&postId={$_GET['postId']}");

    

    //index.php?page=view&postId=7
} else {

//--- Hämtar input innehåll som ska till DB ---//
    $comment = (!empty($_POST['comment']) ? $_POST['comment'] : "");
    $userid = (!empty($_POST['userid']) ? $_POST['userid'] : "");
    $postId = (!empty($_POST['postId']) ? $_POST['postId'] : "");
    
    
    //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
    $comment = htmlspecialchars($comment);
    $userid = htmlspecialchars($userid);

    //--- ERROR meddelanden för kommentarer ---//
    
   //--- QUERIES till DB ---//

    $query = "INSERT INTO comments ( Content, PostsId, UsersId ) VALUES ( :comment, :postId, :userid );";
 
    
        $sth = $dbh->prepare($query);
        $sth->bindParam(':comment', $comment);
        $sth->bindParam(':postId', $postId);
        $sth->bindParam(':userid', $userid);
      
        $return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php");
};
}
    ?>
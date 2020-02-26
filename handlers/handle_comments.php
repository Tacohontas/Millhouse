<?php
include("../includes-partials/database_connection.php");



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
    
    echo "det funka";
};

    ?>
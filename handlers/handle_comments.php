<?php
include("../includes-partials/database_connection.php");



//--- Hämtar input innehåll som ska till DB ---//
    $comment = (!empty($_POST['comment']) ? $_POST['comment'] : "");
    $username = (!empty($_POST['username']) ? $_POST['username'] : "");
    $postId = (!empty($_POST['postId']) ? $_POST['postId'] : "");
    
    
    //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
    $comment = htmlspecialchars($comment);
    $username = htmlspecialchars($username);

    //--- ERROR meddelanden för kommentarer ---//
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
   //--- QUERIES till DB ---//

    $query = "INSERT INTO comments ( Content, PostsId, UsersId ) VALUES ( :comment, :postId, :username );";
 
    
        $sth = $dbh->prepare($query);
        $sth->bindParam(':comment', $comment);
        $sth->bindParam(':postId', $postId);
        $sth->bindParam(':username', $username);
      
        

        $return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    
    echo "det funka";
};

    ?>
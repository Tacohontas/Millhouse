<?php
include("../includes-partials/database_connection.php");


//--- Hämtar input innehåll som ska till DB ---//
$comment = (!empty($_POST['comment']) ? $_POST['comment'] : "");
$userId = (!empty($_POST['userid']) ? $_POST['userid'] : "");
$postId = (!empty($_POST['postId']) ? $_POST['postId'] : "");


// --- Tar bort kommentaren om den hårdkodade GET-variabeln "delete" finns --- //
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $query = "DELETE FROM Comments WHERE Id = :commentsId;";
    $sth = $dbh->prepare($query);
    $commentsId = $_GET['id'];
    $sth->bindParam(':commentsId', $commentsId);
    $return = $sth->execute();

    header("location:../index.php?page=view&postId={$_GET['postId']}#comment");
} else {

    //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
    $comment = htmlspecialchars($comment);
    $errors = false;


    //--- ERROR meddelanden för kommentarer ---//
    if (empty($comment)) {
        $errorMessages .= "Skriv din kommentar. ";
        $errors = true;
    }

    if (strlen($comment) > 200) {
        $errorMessages .= "Din kommentar innehåller för många tecken. ";
        $errors = true;
    }

    if ($errors == true) {
        session_start();
        $_SESSION['error_message'] = $errorMessages;

        header("location:../index.php?page=view&postId={$postId}&error=true");
        die;
    }

    //--- QUERIES till DB ---//

    $query = "INSERT INTO Comments ( Content, PostsId, UsersId ) VALUES ( :comment, :postId, :userid );";

    //--- Hacker attack prevent --- //
    $sth = $dbh->prepare($query);
    $sth->bindParam(':comment', $comment);
    $sth->bindParam(':postId', $postId);
    $sth->bindParam(':userid', $userId);

    $return = $sth->execute();

    if (!$return) {
        print_r($dbh->errorInfo());
    } else {
        header("location:../index.php?page=view&postId={$postId}#comment");
    };
}

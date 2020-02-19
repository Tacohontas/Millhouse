<?php
include('database_connection.php');

$username = $_POST['user_name'];
$password = md5($_POST['password']); // md5() krypterar med md5-kryptering. Bra för lösen etc.
$email = $_POST['email'];
$isAdmin = $_POST['is_admin'];


// SQL-Queries
$query = "INSERT INTO Users(Username, Password, Email, IsAdmin) VALUES ('$username', '$password', '$email', '$isAdmin');";
$getquery = "SELECT Id, Username, Password FROM Users WHERE Username='$username' AND Password='$password' OR Username='$username';";

 


// Ställer fråga till DB + sätter resultatet i $result
$dataFromDB = $dbh->query($getquery);
$result = $dataFromDB->fetchAll();



//Kolla ifall användaren redan finns i databasen:

// Får vi 0 rader tillbaka från vår DB så betyder det att användaren ej finns.

if(!count($result) == 0){
    // Skicka tillbaka till signup med en hårdkodad GET-variabel som resulterar i felmeddelande.
    echo "användare finns redan";
    
    
} else{
    // Matar in i DB om användaren ej finns.
    $insertToDB = $dbh->query($query);

    if(!$insertToDB){
        // Ifall det av någon anledning inte går att lägga till i DB:
        echo "någonting blev galet!";
    } else {
        // Skicka vidare till login.php.
        echo "användare skapades!";
    }
}

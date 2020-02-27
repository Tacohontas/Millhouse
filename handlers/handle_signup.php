<?php
include("../includes-partials/database_connection.php");

$username = $_POST['username'];
$password = md5($_POST['password']); // md5() krypterar med md5-kryptering. Bra för lösen etc.
$email = $_POST['email'];
// $isAdmin = $_POST['is_admin']; // Vi skapar admin-användare manuellt. Inget man kan göra via hemsidan.

// Ifall alla fält ej är ifyllda
if (empty($username) || empty($password) || empty($email)) {
    // Skickas till login.php med hårdkodad getvariabel som visar error-meddelande
    header("location:../signup.php?error=emptyvalues");
    die;
}

// SQL-Queries
$query = "INSERT INTO Users(Username, Password, Email) VALUES (:username, :password, :email);";
// "isAdmin = 0" betyder att användare ej har admin-rättigheter.
$getquery = "SELECT Id, Username, Password FROM Users WHERE Username='$username' AND Password='$password' OR Username='$username';";



// Ställer fråga till DB + sätter resultatet i $result
$dataFromDB = $dbh->query($getquery);
$result = $dataFromDB->fetchAll();


echo "<pre>";
print_r($_POST);
echo "</pre>";


//Kolla ifall användaren redan finns i databasen:

// Får vi 0 rader tillbaka från vår DB så betyder det att användaren ej finns.
if (!count($result) == 0) {
    // Skicka tillbaka till signup med en hårdkodad GET-variabel som resulterar i felmeddelande.
    header("location:../index.php?page=signup&error=true");
    echo "användare finns redan";
} else {
    $sth = $dbh->prepare($query);

    $sth->bindParam(':username', $username);
    $sth->bindParam(':password', $password);
    $sth->bindParam(':email', $email);

    // Matar in i DB om användaren ej finns registrerad.
    $insertToDB = $sth->execute();


    if (!$insertToDB) {
        // Ifall det av någon anledning inte går att lägga till i DB:
        echo "någonting blev galet!";
    } else {
        // Användare skapas! 
        session_start();


        // --- LOGGA IN --- // 


        // Sparar användarnamn och lösen i SESSION-variabeln. 
        $_SESSION['Username'] = $username;
        $_SESSION['Password'] = $password;

        // Skicka vidare till login.php.
        header("location:handle_login.php");
    }
}

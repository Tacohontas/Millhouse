<?php
include("../includes-partials/database_connection.php");



$username = (!empty($_POST["username"])) ? $_POST["username"] : "";
$password = (!empty($_POST["password"])) ? md5($_POST['password']) : "";
$username = htmlspecialchars($username);


// Ifall alla fält ej är ifyllda
if(empty($username) || empty($password)){
    // Skickas till login.php med hårdkodad getvariabel som visar error-meddelande
    header("location:../login.php?error=emptyvalues");
    die;
}



$getquery = "SELECT Id, Username, Password, IsAdmin FROM Users WHERE Username='$username' AND Password='$password'";

$dataFromDB = $dbh->query($getquery);
$row = $dataFromDB->fetch(PDO::FETCH_ASSOC);




// Ifall vårt svar från DB är tomt = finns ingen användare med den infon
if(empty($row)){
    //Skickar tillbaka till signupForm.php med en hårdkodad GET-variabel
    header("location:../login.php?error=true");
} else{
    // Skicka vidare till inloggningslanding
    echo "Du kan logga in";
    session_start();

    // Sparar användarnamn och lösen i SESSION-variabeln. Den är TYP som localstorage i JS. 
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['Password'] = $row['Password'];
    $_SESSION['IsAdmin'] = $row['IsAdmin'];

    header("location:../index.php");

    

}


?>


<?php
include('database_connection.php');

$userName = $_POST['username'];
$password = md5($_POST['password']);

$getquery = "SELECT Id, Username, Password FROM Users WHERE Username='$userName' AND Password='$password'";

$dataFromDB = $dbh->query($getquery);
$row = $dataFromDB->fetch(PDO::FETCH_ASSOC);


// Ifall vårt svar från DB är tomt = finns ingen användare med den infon. 
if(empty($row)){
    //Skickar tillbaka till signupForm.php med en hårdkodad GET-variabel.
    echo "Det gick ej att logga in";
} else{
    // Skicka vidare till inloggningslanding
    echo "Du kan logga in";

    session_start();

    // Sparar användarnamn och lösen i SESSION-variabeln. Den är TYP som localstorage i JS. 
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['Password'] = $row['Password'];

    // header("location:index.php");

    

}


?>


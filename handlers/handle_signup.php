<?php
include("../includes-partials/database_connection.php");

$username = $_POST['username'];
$password = md5($_POST['password']); // md5() krypterar med md5-kryptering. Bra för lösen etc.
$email = $_POST['email'];
// $isAdmin = $_POST['is_admin']; // Vi skapar admin-användare manuellt. Inget man kan göra via hemsidan.



echo "<pre>";
print_r($_POST);
echo "</pre>";


// ERRORZONE



// Ifall alla fält ej är ifyllda
if (empty($username) || empty($password) || empty($email)) {
    $errorMessages .= "Fyll i alla fält. ";
    $errors = true;
}

// Ifall användarnamnet innehåller ej tillåtna tecken.
if (preg_match('/[^A-za-z0-9]/', $username)) {
    $errorMessages .= 'Användarnamnet får enbart innehålla siffror och bokstäver mellan A-Z. ';
    $errors = true;
}

if(strlen($username) > 20){
    $errorMessages .= 'Användarnamnet är för långt! Får max vara 20 tecken. ';
    $errors = true;
}

if(strlen($_POST['password']) < 12){
    $errorMessages .= 'Ditt lösenord måste innerhålla minst 12 tecken. ';
    $errors = true;
}


// --- Kollar ifall användaren redan finns i databasen:
$getquery = "SELECT Id, Username, Password FROM Users WHERE Username='$username' AND Password='$password' OR Username='$username';";
$dataFromDB = $dbh->query($getquery);
$result = $dataFromDB->fetchAll();

// Får vi 0 rader tillbaka från vår DB så betyder det att användaren ej finns.
if (!count($result) == 0) {
    $errorMessages .= "Användarnamn är upptaget.";
    $errors = true;
}

if ($errors == true) {
    header("location:../index.php?page=signup&error=true&errormessage={$errorMessages}");
    die;
}


// -- FÖRSÖKER SKAPA ANVÄNDARE

$query = "INSERT INTO Users(Username, Password, Email) VALUES (:username, :password, :email);";
$sth = $dbh->prepare($query);

$sth->bindParam(':username', $username);
$sth->bindParam(':password', $password);
$sth->bindParam(':email', $email);

$insertToDB = $sth->execute();


if (!$insertToDB) {
    // Ifall det av någon anledning inte går att lägga till i DB:
    echo "någonting blev galet!";
} else {
    // Användare skapas! 
    session_start();

    // --- LOGGAS IN --- // 


    // Sparar användarnamn och lösen i SESSION-variabeln. 
    $_SESSION['Username'] = $username;
    $_SESSION['Password'] = $password;

    // Skicka vidare till login.php.
    header("location:handle_login.php");
}

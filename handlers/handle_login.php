<?php
include("../includes-partials/database_connection.php");

$username = (!empty($_POST["username"])) ? $_POST["username"] : "";
$password = (!empty($_POST["password"])) ? md5($_POST['password']) : "";
$username = htmlspecialchars($username);


// -- När användare kommer från handle_signup -- // 
session_start();
if (isset($_SESSION['Username'])) {
    $username = (isset($_SESSION["Username"])) ? $_SESSION["Username"] : "";
    $password = (isset($_SESSION["Password"])) ? $_SESSION["Password"] : "";
}

// -- ERROR ZONE --
$errors = false;

$getquery = "SELECT Id, Username, Password, IsAdmin FROM Users WHERE Username='$username' AND Password='$password'";

$dataFromDB = $dbh->query($getquery);
$row = $dataFromDB->fetch(PDO::FETCH_ASSOC);


// Ifall vårt svar från DB är tomt = finns ingen användare med den infon
if (empty($row)) {
    $errorMessages .= "Fel användarnamn/lösen. ";
    $errors = true;
}


if (empty($username) || empty($password)) {
    $errorMessages = "Du måste fylla i alla fält. ";
    $errors = true;
}


if ($errors == true) {
    session_start();
    $_SESSION['error_message'] = $errorMessages;
    header("location:../index.php?page=home&error=true");
    die;
}


// INLOGGNING
session_start();

// Sparar användarnamn och lösen i SESSION-variabeln.
$_SESSION['Username'] = $row['Username'];
$_SESSION['Password'] = $row['Password'];
$_SESSION['IsAdmin'] = $row['IsAdmin'];
$_SESSION['UsersId'] = $row['Id'];


if ($_SESSION['IsAdmin'] == 1) {
    header("location:../index.php?page=admin");
} else {
    header("location:../index.php");
};

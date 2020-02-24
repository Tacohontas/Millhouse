<?php
include("./includes-partials/start_header.php");

?>

<?php

session_start();

if(isset($_SESSION['Username'])){
    echo $_SESSION['Username']." är inloggad!";
    echo "<br>";
    echo '<a href="./handlers/logout.php">Logga ut</a>';
}


?>

Startsidan haj haj

<?php
include("./includes-partials/footer.php");
?>
<?php
include("./includes-partials/header.php")
?>

<?php

if (isset($_GET['error']) && !empty($_GET['error'])) {
    if($_GET['error'] == 'emptyvalues'){
        echo "Du måste fylla i alla fält";
    } else {
        echo "Det gick inte att logga in";
    }
};
?>


<form action="./handlers/handle_login.php" method="post">
    <input type="text" placeholder="Username" name="username">
    <input type="password" placeholder="Password" name="password">
    <input type="submit" name="submitLogin" value="Logga in">
</form>

<?php
include("./includes-partials/footer.php");
?>
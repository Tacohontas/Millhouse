<?php
include("./includes-partials/header.php")
?>

<?php

// TA BORT

if (isset($_GET['error']) && !empty($_GET['error'])) {
    if($_GET['error'] == 'emptyvalues'){
        echo "Du måste fylla i alla fält";
    } else {
        echo "Det gick inte att logga in";
    }
};
?>


<form action="./handlers/handle_login.php" method="post">
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" name="submitLogin" value="Logga in" required>
</form>

<?php
include("./includes-partials/footer.php");
?>
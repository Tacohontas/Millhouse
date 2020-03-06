<?php
include("./includes-partials/header.php")
?>

<form action="./handlers/handle_login.php" method="post">
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" name="submitLogin" value="Logga in" required>
</form>

<?php
include("./includes-partials/footer.php");
?>
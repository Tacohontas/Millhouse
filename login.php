<?php
include("./includes-partials/header.php")
?>


<form action="./includes-partials/handle_login.php" method="post">
    <input type="text" placeholder="Username" name="username">
    <input type="password" placeholder="Password" name="password">
    <input type="submit" value="Logga in">
</form>

<?php
include("./includes-partials/footer.php")
?>
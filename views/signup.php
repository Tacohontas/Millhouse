<?php
include("./includes-partials/header.php")
?>

<h1>Registrera användare</h1>


<form method="POST" action="./handlers/handle_signup.php">
    <input type="text" name="username" placeholder="username" required>
    <input type="password" name="password" placeholder="password" required><br>
    <input type="email" name="email" placeholder="mail" required><br>
    <!-- Har kommenterat bort is_admin-fältet eftersom vi gör de användarna manuellt. -->
    <!-- <input type="number" name="is_admin" placeholder="0 eller 1" required> -->
    <input class="signup" type="submit" value="Signup">

</form>


<?php
include("./includes-partials/footer.php")
?>
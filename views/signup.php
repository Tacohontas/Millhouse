<?php
include("./includes-partials/header.php")
?>

<h1 class="title">Registrera användare</h1>


<form  class="form" method="POST" action="./handlers/handle_signup.php">
    <input class="input" type="text" name="username" placeholder="Välj användarnamn" maxlength="20" required>
    <input class="input" type="password" name="password" placeholder="Välj lösenord" minlength="12" required><br>
    <input class="input" type="email" name="email" placeholder="Din email" required><br>
    <!-- Har kommenterat bort is_admin-fältet eftersom vi gör de användarna manuellt. -->
    <!-- <input type="number" name="is_admin" placeholder="0 eller 1" required> -->
    <input class="signup" type="submit" value="Registrera">

</form>


<?php
include("./includes-partials/footer.php")
?>
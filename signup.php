<?php
include("./includes-partials/header.php")
?>

<h1>Registrera användare</h1>

<?php
// Ifall vi har key "error" i vår GET-array så visar vi felmeddelade:
if (isset($_GET['error']) && !empty($_GET['error'])) {
    if($_GET['error'] == 'emptyvalues'){
        echo "Du måste fylla i alla fält";
    } else {
        echo "<h3>Användarnamnet finns redan!</h3>";
    }
};

?>

<form method="POST" action="./includes-partials/handle_signup.php">
    <input type="text" name="username" placeholder="username" >
    <input type="password" name="password" placeholder="password" ><br>
    <input type="email" name="email" placeholder="mail" ><br>
    <!-- Har kommenterat bort is_admin-fältet eftersom vi gör de användarna manuellt. -->
    <!-- <input type="number" name="is_admin" placeholder="0 eller 1" required> -->
    <input class="signup" type="submit" value="Signup">

</form>


<?php
include("./includes-partials/footer.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering</title>
    <link rel="stylesheet" href="#">
</head>

<body>


    <center>
        <h1>Registrera användare</h1>

        <?php
        // Ifall vi har key "error" i vår GET-array så visar vi felmeddelade:
        if (isset($_GET['error']) && $_GET['error'] == true) {
            echo "<h3>Användarnamnet finns redan!</h3>";
        }
        ?>

        <form method="POST" action="./includes-partials/handle_signup.php">
            <input type="text" name="user_name" placeholder="username" class="form_username">
            <input type="password" name="password" placeholder="password"><br>
            <input type="email" name="email" placeholder="mail"><br>
            <input type="number" name="is_admin" placeholder="0 eller 1">
            <input class="signup" type="submit" value="Signup">

        </form>
        
    </center>
</body>

</html>
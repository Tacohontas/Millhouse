<?php
include("./includes-partials/header.php");
?>

<?php

@session_start();

if (isset($_SESSION['Username']) && $_SESSION['IsAdmin'] == 1) {
    include("./includes-partials/createpost_form.php");
} else {
    echo "bara admin får blogga :(";
};
?>


<?php
include("./includes-partials/footer.php");
?>
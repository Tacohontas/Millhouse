<?php
include("./includes-partials/header.php");
?>

<?php

@session_start();

if(@$_GET['error'] == true){
    echo $_GET['errormessage'];
}

if (isset($_SESSION['Username']) && $_SESSION['IsAdmin'] == 1) {
    echo $_SESSION['Username'] . " är inloggad!";
    
    include("./includes-partials/createpost_form.php");


} else {
    echo "bara admin får blogga :(";
};
?>


<?php
include("./includes-partials/footer.php");
?>
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

include("./includes-partials/login_form.php");
?>


<?php
include("./includes-partials/footer.php");
?>
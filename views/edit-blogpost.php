<?php

include("./includes-partials/header.php");
include("./includes-partials/database_connection.php");


@session_start();


if (isset($_SESSION['Username']) && $_SESSION['IsAdmin'] == 1) {

    // Skapa query för att redigera inlägg

    $getquery = "SELECT id, title, content, img, categoriesid FROM Posts WHERE Id = " . $_GET['postId'] . ";";
    $dataFromDB = $dbh->query($getquery);



    // -- Hämtar inlägg som skall redigeras

    while ($row = $dataFromDB->fetch(PDO::FETCH_ASSOC)) {
        include("./includes-partials/editpost_form.php");
    }
} else {
    echo "bara admin får blogga :(";
};
?>


<?php
include("./includes-partials/footer.php");
?>
<?php


$page = (isset($_GET['page']) ? $_GET['page'] : '');

session_start();

if ($page == "signup") {

    include("views/signup.php");
} else if ($page == "login") {

    include("views/home.php");
} else if ($page == "create") {

    include("views/create-blogpost.php");
} else if ($page == "view") {

    include("views/view-blogpost.php");
} else if ($page == "search") {

    include("views/search-page.php");
} else if (@$_SESSION['IsAdmin'] == true) {

    if ($page == "edit") {

        include("views/edit-blogpost.php");
    } else if ($page == "admin") {

        include("views/admin.php");
    } else {
        include("views/home.php");
    }
} else {

    include("views/home.php");
};

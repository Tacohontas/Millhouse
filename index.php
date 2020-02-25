<?php


$page =(isset($_GET['page']) ? $_GET['page'] : '');

if($page == "signup") {

    include("views/signup.php");

} else if($page == "login") {

    include("views/login.php");

} else if($page == "create") {

    include("views/create-blogpost.php");

} else if($page == "view") {

    include("views/view-blogpost.php");
} else {

    include("views/home.php");
};




?>

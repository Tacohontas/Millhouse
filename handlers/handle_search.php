<?php

if(isset($_GET['searchQ'])) {
    header("location:../index.php?page=search&searchQ={$_GET['searchQ']}");

} else {
    echo "Nu blev något fel";
    die;
}


?>
<?php

if(isset($_GET['searchQ'])) {
    header("location:../index.php?page=search&searchQ={$_GET['searchQ']}");

} else {
    echo "sos";
}


?>
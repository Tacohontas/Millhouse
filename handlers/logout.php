<?php


session_start();

// Tar bort alla sparade filer i session.
session_destroy();
header("location:../index.php");

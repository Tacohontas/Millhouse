<?php


session_start();

// Tar bort alla sparade filer i session. (Typ cookies).
session_destroy();
header("location:/1E_Millhouse/index.php");

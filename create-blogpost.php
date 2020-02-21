<?php 
include("./includes-partials/header.php")
?>
<center>
<form action="./includes-partials/handle_create-blogpost.php" method="POST">
<input type="text" name="blogpost_title" placeholder="Rubrik..."> <br>
<textarea name="blogpost" id="" cols="30" rows="20">Skapa ditt blogginlägg här...</textarea> <br>
Välj Kategori:

 <br>
<img src="" alt="Här ska man kunna ladda upp en bild" name="blogpost-img"> <br> <br>
<input type="submit" name="publish" value="Skapa inlägg">
</form>
</center>



<?php
include("./includes-partials/footer.php")
?>
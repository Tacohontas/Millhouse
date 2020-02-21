<?php 
include("./includes-partials/header.php")
?>
<center>
<form action="./includes-partials/handle_create-blogpost.php" method="POST">
<input type="text" name="blogpost_title" placeholder="Rubrik..."> <br>
<textarea name="blogpost" id="" cols="30" rows="20">Skapa ditt blogginlägg här...</textarea> <br>
Välj Kategori:
<select name="category" id="">
<option value="1">Solglassögon</option>
<option value="2">Klockor</option>
<option value="3">Inreding</option>
</select>
 <br>
<img src="" alt="Här ska man kunna ladda upp en bild" name="blogpost-img"> <br> <br>
<input type="submit" value="Skapa inlägg">
</form>
</center>



<?php
include("./includes-partials/footer.php")
?>
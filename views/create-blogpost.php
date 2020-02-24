<?php 
include("../includes-partials/header.php");

?>

<?php 

session_start();

if(isset($_SESSION['Username']) && $_SESSION['IsAdmin'] == 1){
    echo $_SESSION['Username']." är inloggad!";

 echo '<center>
        <form action="../handlers/handle_create-blogpost.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="blogpost_title" placeholder="Rubrik..." required> <br> <br>
        <textarea name="blogpost" id="" cols="30" rows="20" required>Skapa ditt blogginlägg här...</textarea> <br>
        Välj Kategori:
        <select name="category" id="">
        <option value="1">Solglassögon</option>
        <option value="2">Klockor</option>
        <option value="3">Inreding</option>
        </select><br>
        Välj bild:
        <input type="file" name="fileToUpload"> <br> <br>
        <input type="submit" name="submit" value="Skapa inlägg">
        </form>
        </center>';

} else {
    echo "bara admin får blogga :(";
};
?>


<?php
include("../includes-partials/footer.php");
?>
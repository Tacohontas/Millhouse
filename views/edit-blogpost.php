<?php
include("../includes-partials/header.php");
include("../includes-partials/database_connection.php");





?>

<h1>Redigera inlägg</h1>

<?php


session_start();

if (isset($_SESSION['Username']) && $_SESSION['IsAdmin'] == 1) {
    echo $_SESSION['Username'] . " är inloggad!";


    // Skapa query för att redigera inlägg

    $getquery = "SELECT id, title, content FROM Posts WHERE Id = " . $_GET['postId'] . ";";
    $dataFromDB = $dbh->query($getquery);

    echo "<pre>";

    while ($row = $dataFromDB->fetch(PDO::FETCH_ASSOC)) {

        echo '<center>
    <form action="../handlers/handle_create-blogpost.php?updatePost=true" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="postId" value="' . $_GET['postId'] . '"><br>

    <input type="text" name="blogpost_title" placeholder="Rubrik..." value="' . $row['title'] . '" required> <br> <br>

    <textarea name="blogpost" id="" cols="30" rows="20" required>' . $row['content'] . '</textarea> <br>
    
    Välj Kategori:
    <select name="category">
    <option value="1">Solglassögon</option>
    <option value="2">Klockor</option>
    <option value="3">Inreding</option>
    </select><br>
        
    <input type="submit" value="Redigera inlägg">
    </form>

    <a href="../handlers/handle_create-blogpost.php?action=delete&id=' . $_GET['postId'] . '">Delete!</a>


    </center>';
    }
} else {
    echo "bara admin får blogga :(";
};
?>


<?php
include("../includes-partials/footer.php");
?>
<?php 
include("../includes-partials/header.php");
include("../includes-partials/database_connection.php");
?>

<?php 

// Skapa query för att redigera inlägg

$getquery = "SELECT id, title, content, img, categoriesId, date_posted, UsersId FROM Posts";
    
    $dataFromDB = $dbh->query($getquery);

echo "<pre>";

while($row = $dataFromDB->fetch(PDO::FETCH_ASSOC)) {  

echo "<b> Rubrik: </b>" . $row['title'];
echo "<b> Inlägg: </b>" . $row['content'] ."<br />";
echo "<b> Kategori: </b>" . $row['categoriesId'] ."<br />";
echo "<b> Datum: </b>" . $row['date_posted'] ."<br />";
echo "<b> Bild: </b>" . $row['img'] ."<br />";
echo "<b> Skribent: </b>" . $row['UsersId'] ."<br />";
echo "<a href='real_edit-blogpost.php?postId=".$row['id']."'>redigera</a>
";

}

echo "</pre>"; 

?>





<?php
include("../includes-partials/footer.php")
?>
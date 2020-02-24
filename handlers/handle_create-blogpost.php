  <?php
    include("../includes-partials/database_connection.php");

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

// --- Tar bort inlägg om den hårdkodade GET-variabeln "delete" finns --- //
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    // Här hämtar vi vår hårdkodade _GET-variabel
    $query = "DELETE FROM PostsWHERE Id = :postsId;";
    $sth = $dbh->prepare($query);
    $postsId = $_GET['id'];
    $sth->bindParam(':postsId', $postsId);
    $return = $sth->execute();

    header("location:../index.php");
} else {



    //--- Hämtar innehåll till DB ---//
    $title = (!empty($_POST['blogpost_title']) ? $_POST['blogpost_title'] : "");
    $blogpost = (!empty($_POST['blogpost']) ? $_POST['blogpost'] : "");
    $CatID = (!empty($_POST['category']) ? $_POST['category'] : "");


    // --- Ladda upp bild  --- //
    if (isset($_POST['submit'])) {
        $file = $_FILES['fileToUpload'];

        $fileName = $_FILES['fileToUpload']['name'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileError = $_FILES['fileToUpload']['error'];
        $fileType = $_FILES['fileToUpload']['type'];
        //Hitta filtypen i uppladdningen
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        //Vilka filer vi tillåter
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../images/uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "Filen är för stor";
                };
            } else {
                echo "Det gick inte att lägga upp filen du valt";
            };
        } else {
            echo "Denna typ av fil stöds ej";
        };
    }

    //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
    $title = htmlspecialchars($title);
    $blogpost = htmlspecialchars($blogpost);
    // $CatId = htmlspecialchars($CatId);

    //--- ERROR meddelanden för create-blogpost ---//
    $errors = false;
    $errorMessages = "";

    if (empty($title) && $_GET['updatePost'] == false) {
        $errorMessages .= "Skriv en rubrik <br />";
        $errors = true;
    }

    if (empty($blogpost) && $_GET['updatePost'] == false) {
        $errorMessages .= "Skriv ditt blogginlägg <br />";
        $errors = true;
    }

    if (empty($CatID) && $_GET['updatePost'] == false) {
        $errorMessages .= "Välj kategori <br />";
        $errors = true;
    }

    if ($errors == true) {
        echo $errorMessages;
        echo "<a href='../create-blogpost.php'> Prova igen! </a>";
        die;
    }


    //--- QUERIES till DB ---//
    if (isset($_GET['updatePost']) && $_GET['updatePost'] == true) {
        if(!empty($blogpost) && !empty($title)){
        $query = "UPDATE PostsSET Title = :title, Content = :blogpost, CategoriesId = :catid WHERE Id = :postId;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(':postId', $_POST['postId']); // Hacker attack-prevent
        }
    } else {
        $query = "INSERT INTO Posts ( Title, Content, IMG, CategoriesId, Usersid) VALUES (:title, :blogpost, :blogpostImg, :catid, 1);";
            //--- Endast admin kan skapa blogginlägg, därav alltid 1 ---//  
        $sth = $dbh->prepare($query);
        $sth->bindParam(':blogpostImg', $fileDestination); // Hacker attack-prevent
    }

    //--- Hacker attack prevent - Bind variablerna ---//
    $sth->bindParam(':title', $title);
    $sth->bindParam(':blogpost', $blogpost);
    $sth->bindParam(':catid', $CatID);

    $return = $sth->execute();

    if (!$return) {
        print_r($dbh->errorInfo());
    } else {
        header("location:../index.php");
        echo "det funka";
    };


}
    ?>
  <?php  
    include("database_connection.php");

    //--- Hämtar innehåll till DB ---//
    $title = (!empty($_POST['blogpost_title']) ? $_POST['blogpost_title'] : "");
    $blogpost = (!empty($_POST['blogpost']) ? $_POST['blogpost'] : "");
    $blogpostImg = (!empty($_POST['fileToUpload']) ? $_POST['fileToUpload'] : "");
    $CatID = (!empty($_POST['category']) ? $_POST['category'] : "");


    // --- Ladda upp bild | OBS FUNKAR EJ --- //
    /* $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    } */



    //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
    $title = htmlspecialchars($title);
    $blogpost = htmlspecialchars($blogpost);

    //--- ERROR meddelanden för create-blogpost ---//
    $errors = false;
    $errorMessages = "";

    if( empty($title) ) {
        $errorMessages .="Skriv en rubrik <br />";
        $errors = true;
    }

    if( empty($blogpost) ) {
        $errorMessages .="Skriv ditt blogginlägg <br />";
        $errors = true;
    }

    if( empty($CatID)) {
        $errorMessages .="Välj kategori <br />";
        $errors = true;
    }

    if ($errors == true) {
    echo $errorMessages;
    echo "<a href='../create-blogpost.php'> Prova igen! </a>";
    die;
    }
    

    //--- QUERIES till DB ---//
    $query = "INSERT INTO posts ( Title, Content, IMG, CategoriesId, Usersid) VALUES (:title, :blogpost, :blogpostImg, :catid, 1);";

    //--- Hacker attack prevent - Bind variablerna ---//
    $sth = $dbh->prepare($query);
    $sth->bindParam(':title', $title);
    $sth->bindParam(':blogpost', $blogpost);
    $sth->bindParam(':blogpostImg', $blogpostImg );
    $sth->bindParam(':catid', $CatID);

    $return = $sth->execute();

    //print_r($_POST);

    if(!$return) {
    print_r($dbh->errorInfo());
    } else {
       header("location:../index.php");
    };



?>
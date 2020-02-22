  <?php  
    include("database_connection.php");

    //--- Hämtar innehåll till DB ---//
    $title = (!empty($_POST['blogpost_title']) ? $_POST['blogpost_title'] : "");
    $blogpost = (!empty($_POST['blogpost']) ? $_POST['blogpost'] : "");
    $blogpostImg = (!empty($_POST['fileToUpload']) ? $_POST['fileToUpload'] : "");
    $CatID = (!empty($_POST['category']) ? $_POST['category'] : "");


    // --- Ladda upp bild | OBS FUNKAR EJ --- //
    if(isset($_POST['submit'])) {
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

        if(in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "din fil är sparad";
                } else {
                    echo "filen är för stor";
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

    /* print_r($_POST);
    echo "det funka"; */

    if(!$return) {
    print_r($dbh->errorInfo());
    } else {
        echo "det funka";
       //header("location:../index.php");
    };



?>
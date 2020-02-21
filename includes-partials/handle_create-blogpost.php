  <?php  
    include("database_connection.php");

    //--- Hämtar innehåll till DB ---//
    $title = (!empty($_POST['blogpost_title']) ? $_POST['blogpost_title'] : "");
    $blogpost = (!empty($_POST['blogpost']) ? $_POST['blogpost'] : "");
    //$blogpostImg = (!empty($_POST['blogpost-img']) ? $_POST['blogpost-img'] : "");
    $CatID = (!empty($_POST['category']) ? $_POST['category'] : "");

    //--- Hacker attack prevent - Det går ej att lägga in HTML kod i text fälten ---//
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
    echo "<a href='./create-blogpost.php'> Prova igen! </a>";
    die;
    }
    

    //--- QUERIES till DB ---//
    $query = "INSERT INTO posts ( title, content) VALUES (:title, :blogpost);";

    //--- Hacker attack prevent - Bind variablerna ---//

    $query = "INSERT INTO posts ( Title, Content, IMG, CategoriesId, Usersid) VALUES (:title, :blogpost, 'img', :catid, 1);";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':title', $title);
    $sth->bindParam(':blogpost', $blogpost);
    //$sth->bindParam(':blogpostImg', $blogpostImg );
    $sth->bindParam(':catid', $CatID);

    $return = $sth->execute();

    print_r($_POST);

    if(!$return) {
  
    print_r($dbh->errorInfo());
    } else {
       
        echo "Publicerat!";
    };



?>
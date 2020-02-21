  <?php  
    include("database_connection.php");
    
    $title = (!empty($_POST['blogpost_title']) ? $_POST['blogpost_title'] : "");
    $blogpost = (!empty($_POST['blogpost']) ? $_POST['blogpost'] : "");
    $blogpostImg = (!empty($_POST['blogpost-img']) ? $_POST['blogpost-img'] : "");
    $CatID = (!empty($_POST['sunglasses']) ? $_POST['sunglasses'] : "");

    //$query = "INSERT INTO posts ( Title, Content, IMG, CategoriesId,) VALUES( $title, $blogpost, $blogpostImg, $CatID );";
    $query = "INSERT INTO posts ( title, content) VALUES (:title, :blogpost);";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':title', $title);
    $sth->bindParam(':blogpost', $blogpost);
    //$sth->bindParam(':blogpostImg', $blogpostImg );
    //$sth->bindParam(':catid', $CatID);

    $return = $sth->execute();

    //$insertToDB = $dbh->query($query);

    //$return = $dbh->exec($query);

    if(!$return) {
    print_r($dbh->errorInfo());
    } else {
       
        echo "Publicerat!";
    };



?>
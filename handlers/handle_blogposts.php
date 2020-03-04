  <?php
    include("../includes-partials/database_connection.php");

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";


    // -- GET VARIABLAR -- // 
    @$action = @$_GET['action'];

    // -- ERROR-meddelanden INIT -- // 
    $errors = false;
    $errorMessages = "";

    // --- Publicera / dölj inlägg --- // 

    if ($action == "hide" || $action == "publish") {
        $isPublished = ($action == 'hide') ? $isPublished = 0 : $isPublished = 1;
        // Här hämtar vi vår hårdkodade _GET-variabel
        $query = "UPDATE Posts SET IsPublished = :isPublished WHERE Id = :postsId ;";
        $sth = $dbh->prepare($query);
        $postsId = $_GET['id'];
        $sth->bindParam(':isPublished', $isPublished);
        $sth->bindParam(':postsId', $postsId);

        $return = $sth->execute();

        header("location:../index.php?page=admin");
        die;
    }



    // --- Tar bort inlägg om den hårdkodade GET-variabeln "delete" finns --- //
    if (isset($_GET['action']) && $_GET['action'] == "delete") {
        // Här hämtar vi vår hårdkodade _GET-variabel
        $query = "DELETE FROM Comments WHERE PostsId = :postsId; DELETE FROM Posts WHERE Id = :postsId;";
        $sth = $dbh->prepare($query);
        $postsId = $_GET['id'];
        $sth->bindParam(':postsId', $postsId);
        $return = $sth->execute();

        // Om inlägget innehöll en bild så tas den bort.
        if ((!empty($_GET['img']))) {
            unlink($_GET['img']);
        }

        // Skickas vidare till Admin-sidan 
        header("location:../index.php?page=admin");
    } else {

        //--- Hämtar input innehåll som ska till DB ---//
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

            if ($fileSize > 0) {
                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 5000000) {
                            $fileNameNew = md5(reset($fileExt)) . "." . $fileActualExt;
                            $fileDestination = '../images/uploads/' . $fileNameNew;
                            if ($fileSize == filesize($fileDestination)) {
                                /* 
                            Om det finns en fil med exakt samma filstorlek 
                            så finns troligen bilden redan uppladdad.
                            */
                                $errorMessages = "Filen finns redan <br />";
                                $errors = true;
                            } else {
                                $emptyFile = false;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            }
                        } else {
                            $errorMessages .= "Filen är för stor <br />";
                            $errors = true;
                        };
                    } else {
                        $errorMessages .= "Det gick inte att ladda upp din fil <br />";
                        $errors = true;
                    };
                } else {
                    $errorMessages .= "Denna typ av fil stöds ej <br />";
                    $errors = true;
                };
            } else {
                $emptyFile = true;
            }
        }

        //--- Hacker attack prevent - Det går ej att lägga in HTML-kod i textfälten ---//
        $title = htmlspecialchars($title);

        // I text-areafältet använder vi oss av CKEDITOR som har inbyggd hackerattack-lösning!
        // $blogpost = htmlspecialchars($blogpost);

        //--- ERROR meddelanden ---//

        if (empty($title)) {
            $errorMessages .= "Skriv en rubrik <br />";
            $errors = true;
        }

        if (empty($blogpost)) {
            $errorMessages .= "Skriv ditt blogginlägg <br />";
            $errors = true;
        }

        if (empty($CatID)) {
            $errorMessages .= "Välj kategori <br />";
            $errors = true;
        }

        if ($errors == true) {

            // Ifall fält lämnas tomma i edit-miljön:
            if (isset($_GET['updatePost']) && $_GET['updatePost'] == true) {
                header("location:../index.php?page=edit&postId={$_POST['postId']}&error=true&errormessage={$errorMessages}");
                die;
            } else {
                // Om fält lämnats tomma i create post-miljön:
                header("location:../index.php?page=create&postId={$_POST['postId']}&error=true&errormessage={$errorMessages}");
                die;
            }
            die;
        }


        //--- QUERIES till DB ---//

        // Ifall inlägget kommer från edit-blogpost:
        if (isset($_GET['updatePost']) && $_GET['updatePost'] == true) {

            $query = "UPDATE PostsSET Title = :title, Content = :blogpost, CategoriesId = :catid WHERE Id = :postId; ";
            $sth = $dbh->prepare($query);

            // Ifall man valt en ny bild så uppdateras den i DB.
            if ($emptyFile == false) {
                // Tar bort den gamla bilden
                if ((!empty($_GET['erase_old_img']))) {
                    unlink($_GET['erase_old_img']);
                }
                $query .= "UPDATE PostsSET IMG = :blogpostImg WHERE Id = :postId;";
                $sth->bindParam(':blogpostImg', $fileDestination);
            }

            $sth->bindParam(':postId', $_POST['postId']); // Påbörjad Hacker attack-prevent


            // Ifall inlägget kommer från create-blogpost
        } else {
            $query = "INSERT INTO Posts ( Title, Content, IMG, CategoriesId, Usersid) VALUES (:title, :blogpost, :blogpostImg, :catid, 1);";
            //--- Endast admin kan skapa blogginlägg, därav alltid 1 ---//  
            $sth = $dbh->prepare($query);
            $sth->bindParam(':blogpostImg', $fileDestination); // Påbörjad Hacker attack-prevent
        }
        //--- Hacker attack prevent - Bind variablerna ---//
        $sth->bindParam(':title', $title);
        $sth->bindParam(':blogpost', $blogpost);
        $sth->bindParam(':catid', $CatID);

        $return = $sth->execute();

        if (!$return) {
            print_r($dbh->errorInfo());
        } else {
            header("location:../index.php?page=admin");
            echo "det funka";
            die;
        };
    }
    ?>
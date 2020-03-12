<?php 

class BLOGPOST {
    private $databasehandler;
    private $blogposts;

    function __construct($databasehandler) {

        $this->databasehandler = $databasehandler;

    }

    public function fetchAll($isPublished = 0, $order = "DESC") {
        // Hämtar alla inlägg.
        // -- Defaultvärde hämtar alla inlägg oavsett om de är publicerade eller inte.

        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts 
        JOIN Categories ON Categories.Id = CategoriesId";
        
        // --- Enbart publicerade inlägg hämtas --- //
        if($isPublished === "published") {
            $query.= " WHERE IsPublished = 1 ";
        }

        // --- SORTERING ---//
        $query.= " ORDER BY date_posted {$order}";

        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }
    // --- När du klickat på ett specifikt blogginlägg du vill visa --- //
    public function fetchByPostID($postId) {
        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts
         JOIN Categories ON Categories.Id = CategoriesId WHERE Posts.id = ".$postId.";";
        
        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }
    //--- När du söker i blogginlägg ---//
    public function searchBlogPosts($searchQ) {

        $query = "SELECT title, content, img, date_posted, name, isPublished FROM Posts JOIN Categories ON Categories.Id = CategoriesId 
        WHERE title LIKE :searchQ OR content LIKE :searchQEntities OR name LIKE :searchQ;";

        //--- Endast Admin kan se dolda inlägg i söken---//
        if (isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 0) {
            $query.= " AND isPublished = 1 OR content LIKE :searchQ AND isPublished = 1 ";
        } else {
            $query.= " OR content LIKE :searchQ";
        };

        $sth = $this->databasehandler->prepare($query);
        $queryParam = '%'. $searchQ . '%';
        $sth->bindParam(':searchQ', $queryParam);
        // ÅÄÖ (etc) är i htmlentities i content, men inte i title. Så därför görs $searchQ om till htmlentities i content.
        $queryParam2 = '%'. htmlentities($searchQ) . '%';
        $sth->bindParam(':searchQEntities', $queryParam2);
       
        $return_array = $sth->execute();
        
        $return_array = $sth->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;

    }
    // --- Hämtar blogginlägget ---//
    public function getBlogPosts() {
        return $this->blogposts;
    }
    
}



?>
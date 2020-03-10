<?php 

class BLOGPOST {
    private $dbh;
    private $blogposts;

    function __construct($dbh) {

        $this->databasehandler = $dbh;

    }

    public function fetchAll($isPublished = 0, $order = "DESC") {
        // Hämtar alla inlägg.
        // -- Defaultvärde hämtar alla inlägg oavsett om de är publicerade eller inte.

        // --- Skriver användare in 1 eller 'published' så kommer enbart publicerade inlägg hämtas.
        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts 
        JOIN Categories ON Categories.Id = CategoriesId";
        
        if($isPublished === "published") {
            $query.= " WHERE IsPublished = 1 ";
        }

        // --- SORTERING ---//
        $query.= " ORDER BY date_posted {$order}";

        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }

    public function fetchByPostID($postId) {
        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts
         JOIN Categories ON Categories.Id = CategoriesId WHERE Posts.id = ".$postId.";";
        
        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }

    public function searchBlogPosts($searchQ) {

        $query = "SELECT title, content, img, date_posted, name, isPublished FROM Posts JOIN Categories ON Categories.Id = CategoriesId 
        WHERE name LIKE :searchQ OR title LIKE :searchQEntities";

        //--- Endast Admin kan söka på dolda inlägg ---//
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
        // $query = "SELECT title, content, img, date_posted, isPublished FROM Posts WHERE title LIKE '%{$searchQ}%' OR content LIKE '%{$searchQ}%'";
        // ÅÄÖ (etc) är i htmlentities i content, men inte i title. Så därför görs $searchQ om till htmlentities i content.
        $query = "SELECT title, content, img, date_posted, isPublished FROM Posts WHERE title LIKE '%{$searchQ}%' OR content LIKE '%".htmlentities($searchQ)."%'";


        $return_array = $this->databasehandler->query($query);
        $return_array = $sth->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;

    }
    public function getBlogPosts() {
        return $this->blogposts;
    }
    
}



?>
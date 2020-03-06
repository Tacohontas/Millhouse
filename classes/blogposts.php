<?php 

class BLOGPOST {
    private $dbh;
    private $blogposts;

    public function __construct($dbh) {

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

        $query.= " ORDER BY date_posted {$order}";

        //$query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts 
        //JOIN Categories ON Categories.Id = CategoriesId WHERE IsPublished = {$isPublished} ORDER BY date_posted {$order}";

        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }

    public function getBlogPosts() {
        return $this->blogposts;
    }

    public function fetchByPostID($postId) {
        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts
         JOIN Categories ON Categories.Id = CategoriesId WHERE Posts.id = ".$postId.";";
        
        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }

      // --- SORTERING ---//
     
      /* 
        public function setOrder($order) {

        $order = "DESC";
    
        $query = "SELECT Posts.id, title, content, img, date_posted, name, isPublished FROM Posts 
        JOIN Categories ON Categories.Id = CategoriesId ORDER BY date_posted $order";

        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
        } */

}



?>
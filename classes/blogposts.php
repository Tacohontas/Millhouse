<?php 

class BLOGPOST {
    private $dbh;
    private $blogposts;

    public function __construct($dbh) {

        $this->databasehandler = $dbh;

    }

    public function fetchAll() {
        $query = "SELECT title, content, img, date_posted, name FROM Posts JOIN categories ON categories.Id = CategoriesId";
        
        $return_array = $this->databasehandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        $this->blogposts = $return_array;
    }

    public function getBlogPosts() {
        return $this->blogposts;
    }


}


?>
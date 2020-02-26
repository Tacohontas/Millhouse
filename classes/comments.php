<?php 


class COMMENT {

    private $dbh;
    private $comments;

    public function __construct($dbh) {

        $this->databasehandler = $dbh;

    }

    public function fetchCommentByPostID($postId) {
        $query = "SELECT Comments.Id, Content, Date_posted, PostsId, UsersId, Username FROM Comments JOIN Users ON Users.id = UsersId WHERE PostsId = ".$postId.";";
        
        $return_an_array = $this->databasehandler->query($query);
        $return_an_array = $return_an_array->fetchAll(PDO::FETCH_ASSOC);
        $this->comments = $return_an_array;
    }

    public function getComments() {
        return $this->comments;
    }



}

?>
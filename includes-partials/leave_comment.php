<div class="leave_comment-container">
    <form class="comment_form" method="POST" action="./handlers/handle_comments.php">

        <input type="hidden" name="postId" value="<?=$_GET['postId'] ?>">
        <input type="hidden" name="userid" value="<?= $_SESSION['UsersId'] ?>">
        <p> <?= $_SESSION['Username'] ?></p>
        <textarea name="comment" id="" cols="30" rows="5" placeholder="Skriv din kommentar" maxlength="150"></textarea>
        <input class="comment_btn" type="submit" value="Kommentera">
    </form>
    </div>
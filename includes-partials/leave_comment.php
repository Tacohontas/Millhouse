<div class="leave_comment-container">
    <form method="POST" action="./handlers/handle_comments.php">

        <input type="hidden" name="postId" value="<?=$_GET['postId'] ?>">
        <input type="hidden" name="userid" value="<?= $_SESSION['UsersId'] ?>">
        <p>Namn: <?= $_SESSION['Username'] ?></p>
        <p>Kommentar:</p>
        <textarea name="comment" id="" cols="30" rows="5" placeholder="Skriv din kommentar"></textarea>
        <input type="submit" value="Kommentera">
    </form>
    </div>
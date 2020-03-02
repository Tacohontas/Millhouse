<form action="./handlers/handle_blogposts.php?updatePost=true&erase_old_img=<?= $row['img'] ?>" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="postId" value="<?= $_GET['postId'] ?>"><br>

    <input type="text" name="blogpost_title" placeholder="Rubrik..." value="<?= $row['title'] ?>" required> <br> <br>

    <textarea name="blogpost" id="content" cols="30" rows="20" required><?= $row['content'] ?></textarea> <br>

    Välj Kategori:
    <select name="category">
        <option value="1">Solglasögon</option>
        <option value="2">Klockor</option>
        <option value="3">Inreding</option>
    </select><br>

    <input type="file" name="fileToUpload"> <br>
    <input type="submit" name="submit" value="Uppdatera">
</form>

<a href="./handlers/handle_blogposts.php?action=delete&id=<?= $_GET['postId'] ?>&img=<?= $row['img'] ?>">Delete!</a>
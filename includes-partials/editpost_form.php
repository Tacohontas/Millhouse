<div class="create_blogpost">
    <form action="./handlers/handle_blogposts.php?updatePost=true&erase_old_img=<?= $row['img'] ?>" method="POST" enctype="multipart/form-data" class="create_blogpost__form">
        <div class="compose">
            <input type="hidden" name="postId" value="<?= $_GET['postId'] ?>">
            <input type="text" class="title" name="blogpost_title" value="<?= $row['title'] ?>" maxlength="20" required>
            <textarea name="blogpost" id="content" cols="30" rows="20" required><?= $row['content'] ?></textarea>
        </div>

        <div class="toolbox">
            <div class="toolbox__upload">

                <div class="upload_preview">
                   <!-- $row['img']'s url börjar med en extra punkt som vill ta bort här -->
                    <img class="upload_preview__img" src="<?= substr($row['img'],1) ?>">

                </div>

                <div class="upload__input">

                    <label for="file">Ladda upp bild</label>
                    <input type="file" name="fileToUpload" id="file" onchange="preview_image(event)">

                </div>
            </div>

            <div class="toolbox__select">
                <h3>VÄLJ KATEGORI</h3>
                <input type="radio" name="category" id="1" value="1" <?php if($row['categoriesid'] == 1) echo "checked"; ?> >
                <label for="1">Solglasögon</label>
                <input type="radio" name="category" id="2" value="2" <?php if($row['categoriesid'] == 2) echo "checked"; ?> >
                <label for="2">Klockor</label>
                <input type="radio" name="category" id="3" value="3" <?php if($row['categoriesid'] == 3) echo "checked"; ?> >
                <label for="3">Inredning</label>
            </div>

            <input type="submit" name="submit" value="uppdatera" class="create_btn">
            <a class="delete" href="./handlers/handle_blogposts.php?action=delete&id=<?= $_GET['postId'] ?>&img=<?= $row['img'] ?>">Ta bort inlägg!</a>

        </div>
    </form>

</div>
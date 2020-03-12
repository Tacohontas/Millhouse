<div class="create_blogpost">

    <form action="./handlers/handle_blogposts.php" method="POST" enctype="multipart/form-data" class="create_blogpost__form">
        <div class="compose">
            <input type="text" name="blogpost_title" placeholder="Här skriver du din rubrik..." class="title" required maxlength="20">
            <textarea id="content" name="blogpost" cols="30" rows="20" required>
                <?php
                // Ifall texten var för lång för så klistras den gamla in för att inte behöva skriva om från början.
                echo @$_GET['failedPost'];

                ?>
                </textarea>
        </div>

        <div class="toolbox">
            <div class="toolbox__upload">

                <div class="upload_preview">
                    <img class="upload_preview__img" src="">
                    <h4 class="upload_preview__text">
                        <div class="img-placeholder">
                            <h2>DIN BILD</h2>
                        </div>
                    </h4>
                </div>

                <div class="upload__input">

                    <label for="file">Ladda upp bild</label>
                    <input type="file" name="fileToUpload" id="file" onchange="preview_image(event)">

                </div>
            </div>

            <div class="toolbox__select">
                <h3>VÄLJ KATEGORI</h3>
                <input type="radio" name="category" id="1" class="input__radio" value="1">
                <label for="1">Solglasögon</label>
                <input type="radio" name="category" id="2" class="input__radio" value="2">
                <label for="2">Klockor</label>
                <input type="radio" name="category" id="3" class="input__radio" value="3">
                <label for="3">Inredning</label>
            </div>

            <input type="submit" name="submit" value="Skapa inlägg" class="create_btn">

        </div>

    </form>
</div>
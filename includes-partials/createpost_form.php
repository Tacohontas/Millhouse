<div class="create_blogpost">

    <form action="./handlers/handle_blogposts.php" method="POST" enctype="multipart/form-data" class="create_blogpost__form">
        <div class="compose">
            <input type="text" name="blogpost_title" placeholder="Här skriver du din rubrik..." class="title" required>

            <textarea id="content" name="blogpost" cols="30" rows="20" required></textarea>
        </div>

        <div class="toolbox">
            <div class="toolbox__upload">
                <h3>Ladda upp en bild:</h3>
                <input type="file" name="fileToUpload">
            </div>

            <div class="toolbox__select">
                <h3>Välj Kategori:</h3>
                <input type="radio" name="category" id="1" value="1">
                <label for="1">Solglasögon</label>
                <input type="radio" name="category" id="2" value="2">
                <label for="2">Klockor</label>
                <input type="radio" name="category" id="3" value="3">
                <label for="3">Inredning</label>


                
                <!-- <select name="category" id="">
                    <option value="1">Solglasögon</option>
                    <option value="2">Klockor</option>
                    <option value="3">Inreding</option>
                </select> -->
            </div>
            <input type="submit" name="submit" value="Skapa inlägg" class="create_btn">

        </div>





    </form>
</div>
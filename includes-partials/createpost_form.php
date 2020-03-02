<div class="create_blogpost">

    <form action="./handlers/handle_blogposts.php" method="POST" enctype="multipart/form-data" class="create_blogpost__form">

        <input type="text" name="blogpost_title" placeholder="Här skriver du din rubrik..." required>

        <textarea id="content" name="blogpost" cols="30" rows="20" required></textarea>

        <h3>Välj Kategori:</h3>
        <select name="category" id="">
            <option value="1">Solglasögon</option>
            <option value="2">Klockor</option>
            <option value="3">Inreding</option>
        </select>

        <h3>Ladda upp en bild:</h3>
        <input type="file" name="fileToUpload">
        <input type="submit" name="submit" value="Skapa inlägg">

    </form>
    </div>







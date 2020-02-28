<center>
<div class="createform">

    <form action="./handlers/handle_blogposts.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="blogpost_title" placeholder="Rubrik..." required> <br> <br>

        <textarea id="content" name="blogpost" cols="30" rows="20" required></textarea> <br>

        Välj Kategori:
        <select name="category" id="">
            <option value="1">Solglassögon</option>
            <option value="2">Klockor</option>
            <option value="3">Inreding</option>
        </select><br>

        Välj bild:
        <input type="file" name="fileToUpload"> <br> <br>
        <input type="submit" name="submit" value="Skapa inlägg">

    </form>
    </div>
</center>







<div class="postmenu_post">
<b> Rubrik: </b><?= $BlogPost['title'] ?>
<b> Datum: </b><?= $BlogPost['date_posted'] ?> <br />
<a href='index.php?page=view&postId=<?= $BlogPost['id'] ?>'>Läs inlägg</a><br>
<a href='index.php?page=edit&postId=<?= $BlogPost['id'] ?>'>Redigera</a><br>
<a class="delete" href="./handlers/handle_blogposts.php?action=delete&id=<?= $BlogPost['id'] ?>&img=<?= $BlogPost['img'] ?>">Delete!</a><br>


<?php
// Ifall inlägget ej är publicerat så visas "Publicera"-länken. Annars en "Dölj"-länk.
if ($BlogPost['isPublished'] == 0) {
    echo '<a href="./handlers/handle_blogposts.php?action=publish&id=' . $BlogPost['id'] . '">Publicera!</a>';
} else {
    echo '<a href="./handlers/handle_blogposts.php?action=hide&id=' . $BlogPost['id'] . '">Dölj inlägg</a>';
}
?>

</div>
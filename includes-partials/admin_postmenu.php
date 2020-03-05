<div class="postmenu_post">
    <p><?= $BlogPost['id'] ?></p>
    <p><?= $BlogPost['title'] ?></p>
    <p><?= $BlogPost['date_posted'] ?></p>
        <a class="postmenu_post__actions" href='index.php?page=view&postId=<?= $BlogPost['id'] ?>'>Se inlägg</a>
        <a class="postmenu_post__actions" href='index.php?page=edit&postId=<?= $BlogPost['id'] ?>'>Redigera</a>

        <?php
        // Ifall inlägget ej är publicerat så visas "Publicera"-länken. Annars en "Dölj"-länk.
        if ($BlogPost['isPublished'] == 0) {
            echo '<a class="publish postmenu_post__actions" href="./handlers/handle_blogposts.php?action=publish&id=' . $BlogPost['id'] . '">Publicera!</a>';
        } else {
            echo '<a class="postmenu_post__actions hide" href="./handlers/handle_blogposts.php?action=hide&id=' . $BlogPost['id'] . '">Dölj inlägg</a>';
        }
        ?>

<a class="delete postmenu_post__actions" href="./handlers/handle_blogposts.php?action=delete&id=<?= $BlogPost['id'] ?>&img=<?= $BlogPost['img'] ?>">Delete!</a>

</div>
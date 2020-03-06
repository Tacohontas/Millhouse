<div class="postmenu_post">
    <div class="postmenu_post__info">
        <p><?= $BlogPost['id'] ?></p>
        <p><?= $BlogPost['title'] ?></p>
        <!-- $BlogPost['img']'s url börjar med en extra punkt som vill ta bort här -->
        <img class="postmenu_post__img" src="<?= substr($BlogPost['img'], 1) ?>" alt="">
        <p><?= $BlogPost['date_posted'] ?></p>
    </div>
    <div class="postmenu_post__actions">
        <a class="action" href='index.php?page=view&postId=<?= $BlogPost['id'] ?>'>Se inlägg</a>
        <a class="action" href='index.php?page=edit&postId=<?= $BlogPost['id'] ?>'>Redigera</a>

        <?php
        // Ifall inlägget ej är publicerat så visas "Publicera"-länken. Annars en "Dölj"-länk.
        if ($BlogPost['isPublished'] == 0) {
            echo '<a class="publish action" href="./handlers/handle_blogposts.php?action=publish&id=' . $BlogPost['id'] . '">Publicera!</a>';
        } else {
            echo '<a class="action hide" href="./handlers/handle_blogposts.php?action=hide&id=' . $BlogPost['id'] . '">Dölj inlägg</a>';
        }
        ?>

        <a class="delete action" href="./handlers/handle_blogposts.php?action=delete&id=<?= $BlogPost['id'] ?>&img=<?= $BlogPost['img'] ?>">Delete!</a>
    </div>
</div>
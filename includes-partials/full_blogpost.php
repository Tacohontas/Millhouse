<div class='blogpost'>
  <h2><?= $BlogPost['title'] ?></h2>
  <?= $BlogPost['date_posted'] ?> |
  <?= $BlogPost['name'] ?>
  <img src="images/<?= $BlogPost['img'] ?>" alt='Här ska det va en bild' maxheight=800 width=380>
  <p><?= $BlogPost['content'] ?></p>
  <?php if (isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1) {
    echo "<h3><a href='index.php?page=edit&postId=" . $BlogPost['id'] . "'>Redigera </a></h3>";
  } ?>
</div>
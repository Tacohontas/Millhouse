<div class='blogpost'>
  <h2><?= $BlogPost['title'] ?></h2>
  <?= $BlogPost['date_posted'] ?> |
  <?= $BlogPost['name'] ?> <br />
  <img src="images/<?= $BlogPost['img'] ?>" alt='Här ska det va en bild' maxheight=800 width=400>
  <?= $BlogPost['content'] ?>
  <?php if (isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1) {
    echo "<h3><a href='index.php?page=edit&postId=" . $BlogPost['id'] . "'>Redigera </a></h3>";
  } ?>
</div>
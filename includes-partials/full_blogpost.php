<div class='blogpost'>
  <h2 class="heading"><?= $BlogPost['title'] ?></h2> 
   <?= $BlogPost['name'] ?> |
  <?= $BlogPost['date_posted'] ?>
<?php 
if(isset($BlogPost['img'])){
  echo "<img class='blogpost_img' src='images/{$BlogPost['img']}' alt='Här ska det va en bild' maxheight=800 width=380>";
};
?>
<div class="blogpost_content"><?= $BlogPost['content'] ?></div>
  <?php if (isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1) {
    echo "<a class='edit_btn' href='index.php?page=edit&postId=" . $BlogPost['id'] . "'>Redigera </a>";
  }?> 
</div>
<div class='blogpost_section'>
    <h2><a href="index.php?page=view&postId=<?= $BlogPost['id'] ?>"> <?= $BlogPost['title'] ?></a> </h2>
    <?php 
if(isset($BlogPost['img'])){
  echo "<img class='blogpost_img' src='images/{$BlogPost['img']}' alt='Här ska det va en bild' maxheight=600 width=300>";
};
?>    <?= $BlogPost['name'] ?> |
    <?= $BlogPost['date_posted'] ?>
</div>
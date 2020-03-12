<!-- Här hämtas endast en preview av blogginlägget som visas på home -->
<div class='blogpost_section'>
    <h2><a href="index.php?page=view&postId=<?= $BlogPost['id'] ?>"> <?= $BlogPost['title'] ?></a> </h2>
    <?php 
if(isset($BlogPost['img'])){
  echo "<img class='blogpost_img' src='images/{$BlogPost['img']}' alt='Här ska det va en bild' maxheight=600 width=300>";
};
?>  
<div class="blogpost_content"><?= $BlogPost['content'] ?></div>
<?= $BlogPost['name'] ?> |
<?= $BlogPost['date_posted'] ?>

<h4><a href="index.php?page=view&postId=<?= $BlogPost['id'] ?>#comment">Kommentera</a></h4>
</div>
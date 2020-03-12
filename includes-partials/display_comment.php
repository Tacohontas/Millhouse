<div class="comment_container">

<div class="comment" id="comment">
    <p class="username"><?= $Comment['Username']?></p> <p>skriver: <?= $Comment['Date_posted']?>  </p>
    <h4> <?= $Comment['Content']?></h4>
    
    
    <!-- Admin kan radera alla kommentarer + Inloggad använadre kan ta bort sina egna kommentarer -->
    <?php if(isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
    echo '<a href="./handlers/handle_comments.php?action=delete&id=' . $Comment['Id'] .'&postId='.$_GET['postId'].'"> Ta bort</a>';
    } elseif (isset($_SESSION['Username']) && $_SESSION['Username'] == $Comment['Username']) {
        echo '<a href="./handlers/handle_comments.php?action=delete&id=' . $Comment['Id'] .'&postId='.$_GET['postId'].'"> Ta bort</a>';
    } ?>
    
</div>

</div>



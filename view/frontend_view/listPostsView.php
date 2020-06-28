<?php $title = 'Mon super blog'; ?>

<?php ob_start(); ?>
<h1>MON 1er BLOG</h1>

<?php
while($one_post = $posts -> fetch())
{
?>
    <div class='posts'>
        <h3><span><?= $one_post['creation_date_fr']. '</span> : ' . htmlspecialchars($one_post['title']); ?></h3>
        <p>
            <?= nl2br(htmlspecialchars($one_post['content'])); ?>
        </p>
        
        <p>
            <a href="index.php?action=post&amp;id=<?= $one_post['id']; ?>">Lien vers les commentaires</a>
        </p>
    </div>
<?php
}
$posts -> closeCursor();
?>

<p><a href="index.php?action=newPost" >Ajouter un article ...</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend_view/template.php'); ?>

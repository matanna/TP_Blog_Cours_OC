<?php $title = 'Article'; ?>

<?php ob_start(); ?>

    <div class='posts'>
        <h1><span><?= $post['creation_date_fr']. '</span> : ' . $post['title'] ?></h1>
        <p><?= $post['content']; ?></p>
        <p><a href="index.php?action=listPosts">Retour à la page d'accueil</a></p>
    </div>
    
    <?php
    while($comment = $comments -> fetch())
    {
    ?>
        <p><?= $comment['comment_date_fr'] ?> - <?= $comment['author'] ?> : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }
    $comments -> closeCursor();
    ?>   

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend_view/template.php'); ?>
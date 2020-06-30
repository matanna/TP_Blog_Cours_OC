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
        <p><a href="index.php?action=modifyComment&amp;id=<?php echo $comment['id']; ?>&amp;post_id=<?php echo $comment['post_id']; ?>">Modifier</a></p>
    <?php
    }
    $comments -> closeCursor();
    ?> 

    <form method='post' action='index.php?action=addComment&amp;id=<?php echo $post['id']; ?>'>
        <p>
            <label for='author'>Votre pseudo :</label>
            <input type='text' id='author' name='author' />
        </p>
        <p>
            <label for='comment'>Votre commentaire :</label>
            <textarea id='comment' name='comment' ></textarea>
        </p>
        <p>
            <input type='submit' value='Envoyer' />
        </p>

    </form>  

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend_view/template.php'); ?>
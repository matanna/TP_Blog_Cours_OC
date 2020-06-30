<?php $title ='Modifier un commentaire'; ?>

<?php ob_start(); ?>

<h1>Modifier le commentaire : </h1>

    <p><?php echo $comment['comment_date_fr'] ?> - <?= $comment['author'] ?> : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <form method='post' action='index.php?action=addmodifyComment&amp;id=<?=$_GET['id']?>&amp;post_id=<?=$_GET['post_id']?>'>
        
    <p>
            <label for='author'>Pseudo :</label>
            <input type='text' id='author' name='author' />
        </p>
        <p>
            <label for='comment'>Votre commentaire :</label>
            <textarea id='comment' name='comment' rows='5' cols='45'></textarea>
        </p>
        <p>
            <input type='submit' value='Envoyer' />
        </p>

    </form>  

<?php $content = ob_get_clean() ?>

<?php require('view/frontend_view/template.php'); ?>
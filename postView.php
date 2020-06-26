<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset='utf-8' />
        <title>Article</title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class='post'>
            <h1><span><?= $post['creation_date_fr']. '</span> : ' . $post['title'] ; ?></h1>
            <p><?= $post['content']; ?></p>
            <p><a href="index.php">Retour à la page d'accueil</a></p>
        </div>
        
        <?php
        while($comment = $comments -> fetch())
        {
        ?>
            <p><?= $comment['comment_date_fr']; ?> - <?= $comment['author']; ?> : <?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
        <?php
        }
        ?>   


</body>

</html>
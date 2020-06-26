<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset='utf-8' />
        <title>Mon super blog </title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <h1>MON 1er BLOG</h1>

        <?php
        while($one_post = $posts -> fetch())
        {
        ?>
            <div class='post'>
                <h3><span><?= $one_post['creation_date_fr']. '</span> : ' . htmlspecialchars($one_post['title']); ?></h3>
                <p><?= nl2br(htmlspecialchars($one_post['content'])); ?></p>
                
                <p><a href="post.php?id=<?= $one_post['id']; ?>">Lien vers les commentaires</a></p>
            </div>
        <?php
        }
        $posts -> closeCursor();
        ?>

    </body>

</html>
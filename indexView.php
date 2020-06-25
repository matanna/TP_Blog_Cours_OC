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
        while($data = $req -> fetch())
        {
        ?>
            <div class='post'>
                <h3><span><?= $data['creation_date_fr']. '</span> : ' . htmlspecialchars($data['title']); ?></h3>
                <p><?= nl2br(htmlspecialchars($data['content'])); ?></p>
                
                <p><a href="commentaire.php?id=<?= $data['id']; ?>">Lien vers les commentaires</a></p>
            </div>
        <?php
        }
        $req -> closeCursor();
        ?>

    </body>

</html>
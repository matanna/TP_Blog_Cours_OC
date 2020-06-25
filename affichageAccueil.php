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
            while($donnees = $req -> fetch())
            {
        ?>
            <div class='post'>
                <h3><span><?php echo $donnees['date_creation_fr']. '</span> : ' . htmlspecialchars($donnees['titre']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
                
                <p><a href="commentaire.php?id=<?php echo $donnees['id']; ?>">Lien vers les commentaires</a></p>
            </div>
        <?php
            }
            $req -> closeCursor();
        ?>

    </body>

</html>
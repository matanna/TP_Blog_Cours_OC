<?php
// Récupération des données

try
{
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=blog;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
    

$billets = $bdd -> query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%im%ss \') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

?>


<!--Affichage-->


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
            while($billet_seul = $billets -> fetch())
            {
        ?>
            <div class='post'>
                <h3><span><?php echo $billet_seul['date_creation_fr']. '</span> : ' . htmlspecialchars($billet_seul['titre']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($billet_seul['contenu'])); ?></p>
                
                <p><a href="commentaire.php?id=<?php echo $billet_seul['id']; ?>">Lien vers les commentaires</a></p>
            </div>
        <?php
            }
            $billets -> closeCursor();
        ?>

    </body>

</html>
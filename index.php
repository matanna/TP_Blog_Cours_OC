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
        //Connexion BDD
        Try
        {
            $bdd = new PDO('mysql:host=localhost;port=3308;dbname=blog;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    

        //Affichage des billets a l'aide d'une boucle
        $billets = $bdd -> query('SELECT id, titre, contenu, date_creation FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

        while($billet_seul = $billets -> fetch())
        {
    ?>
        <div class='post'>
            <h3><span><?php echo $billet_seul['date_creation']. '</span> : ' .$billet_seul['titre']; ?></h3>
            <p><?php echo $billet_seul['contenu']; ?></p>
            
            <!--Passage en GET de l'id de chaque billet-->
            <p><a href="commentaire.php?id=<?php echo $billet_seul['id']; ?>">Lien vers les commentaires</a></p>
        </div>
    <?php
        }
        $billets -> closeCursor();
    ?>

</body>

</html>
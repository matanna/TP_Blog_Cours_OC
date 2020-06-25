<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='utf-8' />
    <title>Article</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

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

    //Affichage du billet seul
    if(isset($_GET['id']))
    {
        //Transtypage valeur GET en int
        $_GET['id'] = (int)$_GET['id'];

        //Récup id max de la table billet
        $max = $bdd -> query('SELECT MAX(id) AS max_id FROM billets');
        $max_id = $max -> fetch();

        //controle valeur non supereur a id max billet
        if($_GET['id'] <= $max_id['max_id'] AND $_GET['id'] != 0)
        {
            $billet = $bdd -> prepare('SELECT * FROM billets WHERE id = ?');
            $billet -> execute(array((int)$_GET['id']));
            $billet_seul = $billet -> fetch();
            ?>

            <div class='post'>
                <h1><span><?php echo $billet_seul['date_creation']. '</span> : ' .$billet_seul['titre']; ?></h1>
                <p><?php echo $billet_seul['contenu']; ?></p>
                <p><a href="index.php">Retour à la page d'accueil</a></p>
            </div>

            
            <?php
            $billet -> closeCursor();
            //Affichage des commentaires
            echo '<h3>Commentaires :</h3>';

            $commentaires = $bdd -> prepare('SELECT auteur, commentaire, 
                                            DATE_FORMAT(date_commentaire, \'le %d %M %Y à %Hh%im%ss\') AS date_format  
                                            FROM commentaires 
                                            WHERE billet_id = ?
                                            ORDER BY date_commentaire DESC ');
            $commentaires -> execute(array((int)$_GET['id']));
            while($commentaires_seul = $commentaires -> fetch())
            {
                echo '<p><span>' . $commentaires_seul['auteur'] . ', '. $commentaires_seul['date_format'] . '</span>' . ' : </p><p>' . $commentaires_seul['commentaire'] . '</p>';
            }
        }
        else
        {
            echo 'Ce billet n\'existe pas';
        }
        
    }
    else
    {
        echo 'Ce billet n\'existe pas';
    }
    
    ?>
<form method='post' action='commentaires_post.php?id=<?php echo $_GET['id']; ?>'>
    <p><label for="auteur">Auteur :</label><input type='text' name='auteur' id='auteur'/></p>
    <p><label for="commentaire">Commentaires :</label><input type='text' name='commentaire' id='commentaire'/></p>
    <p><input type="submit" value="Envoyer" /></p>
</form>

</body>

</html>
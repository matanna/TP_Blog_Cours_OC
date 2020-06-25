

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

    $req = $bdd -> prepare('INSERT INTO commentaires (auteur,commentaire, billet_id, date_commentaire) VALUES (:auteur, :commentaire, :billet_id, NOW())');
    $req -> execute(array('auteur'=>$_POST['auteur'], 'commentaire'=>$_POST['commentaire'], 'billet_id'=>$_GET['id']));

    header('Location: commentaire.php?id='.$_GET['id']);
    ?>
    

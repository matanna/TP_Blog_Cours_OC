<?php

function getBillets()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=blog;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
        

    $req = $bdd -> query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%im%ss \') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

    return $req;
}

?>
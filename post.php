<?php
require('model.php');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $max_postId= getMaxPostId();
    
    if($_GET['id'] <= $max_postId)
    {
        $post = getPost($_GET['id']);
        $comments = getComments($_GET['id']);
        
        require('postView.php');
    }
    else
    {
        echo 'Oups !!! Ce billet n\'existe pas !! ';
    }   
}
else
{
    echo 'Erreur : Aucun identifiant de billet est envoyé';
}
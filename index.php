<?php 

require 'controller/frontend_controller.php';

if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'listPosts') {
        
        listPosts();
    } elseif ($_GET['action'] == 'post') {
        
        if (isset($_GET['id']) AND $_GET['id'] > 0) {
            
            $max_postId= getMaxPostId();
    
            if ($_GET['id'] <= $max_postId) {
                
                post();
            } else {
                echo 'Ce billet n\'existe pas !! ';
            } 
        } else {
            echo 'Erreur : Aucun identifiant de billet est envoyé';
        }
    } else {
        listPosts();
    }
} else {
    listPosts();
}



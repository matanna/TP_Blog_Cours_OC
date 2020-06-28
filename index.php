<?php 

require 'controller/frontend_controller.php';

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } 
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) AND $_GET['id'] > 0) 
            {
                $max_postId= getMaxPostId();
                if ($_GET['id'] <= $max_postId) { 
                    post();
                } 
                else {
                    throw new Exception('Ce billet n\'existe pas !! ');
                } 
            } 
            else {
                throw new Exception('Aucun identifiant de billet est envoyé');
            }
        } 
        elseif ($_GET['action'] == 'addComment') {
            if (!empty($_POST['author']) AND !empty($_POST['comment'])) {
                addComment(htmlspecialchars($_POST['author']), nl2br(htmlspecialchars($_POST['comment'])), $_GET['id']);
            } 
            else {
                throw new Exception('Certains champs sont vides');
            }

        } 
    } 
    else {
        listPosts();
    }
}
catch (Exception $e) {
    echo 'Erreur : ' . $e -> getMessage();
}
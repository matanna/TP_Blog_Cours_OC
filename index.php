<?php 

require 'controller/frontend_controller.php';

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                $maxPostId = maxPostId();
                if ($_GET['id'] <= $maxPostId) { 
                    post();
                } 
                else {
                    throw new Exception('Ce billet n\'existe pas !!');
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
        elseif ($_GET['action'] == 'addNewPost') {
            if (!empty($_POST['title']) AND !empty($_POST['content'])) {
                addNewPost(htmlspecialchars($_POST['title']), nl2br(htmlspecialchars($_POST['content'])));
            }
            else {
                throw new Exception('Certains champs sont vides');
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            newPost();
        }
        elseif ($_GET['action'] == 'modifyComment') {
            modifyComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'addmodifyComment') {
            if (!empty($_POST['author']) AND !empty($_POST['comment']) AND isset($_GET['id']) AND isset($_GET['post_id'])) {
                addModifyComment(htmlspecialchars($_POST['author']), nl2br(htmlspecialchars($_POST['comment'])), 
                                 htmlspecialchars($_GET['id']), 
                                 htmlspecialchars($_GET['post_id'])
                );
            }
            else {
                throw new Exception('Certains champs sont vides');
            }
        }
        else {
            listPosts();
        }
    } 
    else {
        listPosts();
    }
}
catch (Exception $e) {
    $errorMessage = $e -> getMessage();
    require('view/errorView.php');
}
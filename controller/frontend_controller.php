<?php

require('model/frontend_model.php');

function listPosts()
{
    $posts = getPosts();

    require('view/frontend_view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
        
    $comments = getComments($_GET['id']);
   
    require('view/frontend_view/postView.php');
}

function addComment($author, $comment, $postId)
{
    $affectedLines = insertComment($author, $comment, $postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


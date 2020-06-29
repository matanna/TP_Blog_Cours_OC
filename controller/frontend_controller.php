<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager -> getPosts();

    require('view/frontend_view/listPostsView.php');
}

function maxPostId()
{
    $postManager = new PostManager();

    $maxPostId = $postManager -> getMaxPostId();
    return $maxPostId;
}

function post()
{
    $postManager = new PostManager();
    $post = $postManager -> getPost($_GET['id']);
        
    $commentManager = new CommentManager(); 
    $comments = $commentManager -> getComments($_GET['id']);

   
    require('view/frontend_view/postView.php');
}

function addComment($author, $comment, $postId)
{

    $commentManager = new CommentManager();
    $affectedLines = $commentManager -> insertComment($author, $comment, $postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

}

function addNewPost($titlePost, $contentPost)
{
    $postManager = new PostManager();
    $affectedLines = $postManager -> insertPost($titlePost, $contentPost);

    if ($affectedLines === false) {
        throw new Exception('L\'ajout du post n\'a pas fonctionné');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function newPost()
{
    require('view/frontend_view/newPostView.php');
}


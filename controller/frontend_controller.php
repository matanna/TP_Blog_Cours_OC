<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager -> getPosts();

    require('view/frontend_view/listPostsView.php');
}

function maxPostId()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $maxPostId = $postManager -> getMaxPostId();
    return $maxPostId;
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $post = $postManager -> getPost($_GET['id']);
        
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager(); 
    $comments = $commentManager -> getComments($_GET['id']);

   
    require('view/frontend_view/postView.php');
}

function addComment($author, $comment, $postId)
{

    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
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
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
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

function addModifyComment($author, $comment, $idComment, $postId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $commentManager -> updateComment($author, $comment, $idComment);

    if ($affectedLines === false) {
        throw new Exception('La modification du commentaire n\'a pas fonctionné');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($idcomment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $comment = $commentManager -> displayComment($idcomment);
    require('view/frontend_view/modifyCommentView.php');

}


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

?>
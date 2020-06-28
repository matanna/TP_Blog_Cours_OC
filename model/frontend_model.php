
<?php

function getPosts()
{
    $db = dbConnect();
        
    $req = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%im%ss \') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    $posts = $req;
    return $posts;
}

function getPost($postId)
{
    $db = dbConnect();

    $req = $db -> prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%im%ss \') AS creation_date_fr FROM posts WHERE id = ? ');
    $req -> execute(array($postId));
    $post = $req -> fetch();
    return $post;
}

function getComments($postId)
{
    $db = dbConnect();

    $req = $db -> prepare('SELECT DATE_FORMAT(comment_date, \'le %d/%m/%Y à %Hh%im%ss \') AS comment_date_fr, 
                                              author, comment 
                                              FROM comments 
                                              WHERE post_id = ? 
                                              ORDER BY comment_date DESC'
                         );
    $req -> execute(array($postId));
    $comments = $req;
    return $comments;
}

function insertComment($author, $comment, $postId)
{
    $db = dbConnect();

    $req = $db -> prepare('INSERT INTO comments(author, comment, comment_date, post_id) 
                           VALUES(:author, :comment, NOW(), :post_id)' );
    $req -> execute(array('author' => $author,
                          'comment' => $comment,
                          'post_id' => $postId)
                    );

    $affectedLines = $req;
    return $affectedLines;
}

function getMaxPostId()
{
    $db = dbConnect();

    $req = $db -> query('SELECT MAX(id) AS max_id FROM posts');
    $max_postId = $req -> fetch();

    return $max_postId['max_id'];
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;port=3308;dbname=blog;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

}

?>
<?php

require_once('model/Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this -> dbConnect();
            
        $req = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%im%ss \') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        $posts = $req;
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%im%ss \') AS creation_date_fr FROM posts WHERE id = ? ');
        $req -> execute(array($postId));
        $post = $req -> fetch();
        return $post;
    }

    public function getMaxPostId()
    {
        $db = $this -> dbConnect();

        $req = $db -> query('SELECT MAX(id) AS max_id FROM posts');
        $max_postId = $req -> fetch();

        return $max_postId['max_id'];
    }

    public function insertPost($titlePost, $contentPost)
    {
        $db = $this -> dbConnect();
    
        $req = $db -> prepare ('INSERT INTO posts(title, content, creation_date)
                            VALUES (?, ?, NOW())');
        $req -> execute(array($titlePost, $contentPost));

        $affectedLines = $req;
        return $affectedLines;
    }
}



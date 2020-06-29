<?php 

require_once('model/Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this -> dbConnect();

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

    public function insertComment($author, $comment, $postId)
    {
        $db = $this -> dbConnect();

        $req = $db -> prepare('INSERT INTO comments(author, comment, comment_date, post_id) 
                            VALUES(:author, :comment, NOW(), :post_id)' );
        $req -> execute(array('author' => $author,
                            'comment' => $comment,
                            'post_id' => $postId)
                        );

        $affectedLines = $req;
        return $affectedLines;
    }

}


<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;port=3308;dbname=blog;charset=utf8','root','', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        
        return $db;
    }
}
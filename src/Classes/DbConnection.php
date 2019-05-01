<?php
namespace TopDog\Classes;

class DbConnection {
    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=127.0.0.1; dbname=top_dog', 'root');
    }

    public function getPDO() : \PDO {
     return $this->db;
    }
}
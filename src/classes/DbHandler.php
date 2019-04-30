<?php

class DbHandler
{
    private $dbConnection;

    public function __construct($db) {
        $this->dbConnection = $db;
    }

    public function insertBreed ($db, $breed_name, $sub_breed) {
        $query = $db->prepare("INSERT INTO `breed_table` (`breed_name`, `sub_breed`) VALUES (:breed_name,:sub_breed)");
        $query->bindParam(':breed_name', $breed_name);
        $query->bindParam(':sub_breed', $sub_breed);
        return $query->execute();
    }

    public function insertImages ($db, $breed_id, $url_image) {
        $query = $db->prepare("INSERT INTO `image_table` (`breed_id`, `url_image`) VALUES (:breed_id,:url_image)");
        $query->bindParam(':breed_id', $breed_id);
        $query->bindParam(':sub_breed', $url_image);
        return $query->execute();
    }

    public function getBreed ($db) {
        $query= $db->prepare("SELECT `id`, `breed_name`, `sub_breed` FROM `breed_table`");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

}
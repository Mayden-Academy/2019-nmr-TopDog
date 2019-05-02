<?php

namespace TopDog\Classes;
require_once '../../vendor/autoload.php';

/**
 * Class DbHandler handles inputting breeds into db, inserting images into the db based on the breed, and retrieving the breed name, sub breed
 * and id when required.
 */
class DbHandler
{
    /**
     * @var
     */
    private $dbConnection;

    /**
     * DbHandler constructor.
     *
     * @param $db DbConnection object
     */
    public function __construct(DbConnection $db) {
        $this->dbConnection = $db;
    }

    /**
     * checks whether the database contains any data
     *
     * @return int returns the number of rows of data in the database
     */
    public function checkBreedTableIsEmpty() {
        $db = $this->dbConnection->getPDO();
        $query = $db->prepare("SELECT * FROM `breed_table`");
        $query->execute();
        return $query->rowCount();
    }

    /**
     * checks whether the database contains any data
     *
     * @return int returns the number of rows of data in the database
     */
    public function checkImageTableIsEmpty() {
        $db = $this->dbConnection->getPDO();
        $query = $db->prepare("SELECT * FROM `image_table`");
        $query->execute();
        return $query->rowCount();
    }

    /**
     * inserts the breed and sub breed into the database using different MySQL statements depending on whether the database has content already
     *
     * @param $breed_name string name of dog breed category
     * @param $sub_breed string name of sub dog breed category if available
     *
     * @return boolean dependent on if insertion is successful
     */
    public function insertBreed (string $breed_name, string $sub_breed) :bool{
        $rowCount = $this->checkBreedTableIsEmpty();
        $db = $this->dbConnection->getPDO();
        if ($rowCount ==0) {
            $query = $db->prepare("INSERT INTO `breed_table` (`breed_name`, `sub_breed`) VALUES (:breed_name, :sub_breed)");
            $query->bindParam(':breed_name', $breed_name);
            $query->bindParam(':sub_breed', $sub_breed);
            return $query->execute();
        } else {
            $query = $db->prepare("INSERT INTO `breed_table` (`breed_name`, `sub_breed`) 
                SELECT :breed_name, :sub_breed FROM `breed_table` 
                WHERE NOT EXISTS (SELECT * FROM `breed_table` 
                WHERE `breed_name`= :breed_name AND `sub_breed`= :sub_breed) 
                LIMIT 1");
            $query->bindParam(':breed_name', $breed_name);
            $query->bindParam(':sub_breed', $sub_breed);
            return $query->execute();
        }
    }

    /**
     * inserts urls and breed-ids into the database base using different MySQL statements depending on whether the database has content already
     *
     * @param $breed_id string id of breed type
     * @param $url_image string url to image
     *
     * @return boolean dependent on if insertion is successful
     */
    public function insertImages (string $breed_id, string $url_image) :bool{
        $rowCount = $this->checkImageTableIsEmpty();
        $db = $this->dbConnection->getPDO();
        if ($rowCount ==0) {
            $query = $db->prepare("INSERT INTO `image_table` (`url_image`, `breed_id`) VALUES (:url_image, :breed_id)");
            $query->bindParam(':breed_id', $breed_id);
            $query->bindParam(':url_image', $url_image);
            return $query->execute();
        } else {
            $query = $db->prepare("INSERT INTO `image_table` (`url_image`, `breed_id`) 
                SELECT :url_image, :breed_id FROM `image_table` 
                WHERE NOT EXISTS (SELECT * FROM `image_table` 
                WHERE `url_image`= :url_image AND `breed_id`= :breed_id) 
                LIMIT 1");
            $query->bindParam(':breed_id', $breed_id);
            $query->bindParam(':url_image', $url_image);
            return $query->execute();
        }
    }

    /**
     * retrieves the id, breed names and sub breeds from the breeds table
     *
     * @return array containing the the id, breed_name and sub_breed
     */
    public function getBreed () :array{
        $db = $this->dbConnection->getPDO();
        $query= $db->prepare("SELECT `id`, `breed_name`, `sub_breed` FROM `breed_table`");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

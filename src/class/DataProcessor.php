<?php

class DataProcessor
{
    public $curlHandler;
    public $db;

    /**
     * DataProcessor constructor.
     *
     * @param CurlHandler $curlHandler Curl Request from Class CurlHandler
     *
     * @param DBConnection $db Connection from Class DBConnection
     */

    public function __construct(CurlHandler $curlHandler, DBConnection $db)
    {
        $this->curlHandler = $curlHandler;
        $this->db = $db;
    }


    /**
     * Takes array and reconfigures into another array
     *
     * @param array $breed Array taken from API
     *
     * @return array $result Array that is put into database
     */

    public function processBreedData(array $breed) : array
    {
        $result = [];
        $placeholder = [];
        if (!$this->successApiRequest($breed)) {
            return ['errorMessage' => 'Not successful'];
        } else {
            foreach ($breed['message'] as $key => $value) {
                if (count($value) > 0) {
                    foreach ($value as $subBreed) {
                        $placeholder['breed_name'] = $key;
                        $placeholder['sub_breed'] = $subBreed;
                        array_push($result, $placeholder);
                    }
                } else {
                    $placeholder['breed_name'] = $key;
                    $placeholder['sub_breed'] = '';
                    array_push($result, $placeholder);
                }
            }
            return $result;
        }
    }

    /**
     * Checks if API request has been successful
     *
     * @param  array $breed Array taken from API
     *
     * @return bool Result of if statement
     */

    public function successApiRequest(array $breed) : bool
    {
        if ($breed["status"] === "success"){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Takes id from array taken from top_dog database and creates an id linked to url
     *
     * @param array $breeds Array taken from database
     *
     * @return array $result Array with ids and url for request
     */

    public function createImageUrlWithId(array $breeds) : array
    {
        $result = [];
        $placeholder = [];
        foreach ($breeds as $breed) {
            $placeholder['id'] = $breed['id'];
            $main = $breed['breed_name'];
            if (strlen($breed['sub_breed']) > 0) {
                $sub = $breed['sub_breed'];
                $placeholder['urlRequest'] = 'https=>//dog.ceo/api/breed/'.$main.'-'.$sub.'/images';
            } else {
                $placeholder['urlRequest'] = 'https=>//dog.ceo/api/breed/'.$main.'/images';
            }
            array_push($result, $placeholder);
        }
        return $result;
    }

    public function processImageData($images, $urls)
    {
        $result = [];
        $placeholder = [];
        if (!$this->successApiRequest($images)) {
            return ['errorMessage' => 'Not successful'];
    } else {
            $placeholder['id'] = $urls['id'];
            $placeholder['urlImage'] = [];
            foreach ($images['message'] as $value) {
                array_push($placeholder['urlImage'], $value);
            }
            array_push($result, $placeholder);
        }
        return $result;
    }
}

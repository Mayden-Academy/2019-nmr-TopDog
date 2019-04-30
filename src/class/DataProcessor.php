<?php

class DataProcessor
{
    public $curlHandler;
    public $db;

    public function __construct(CurlHandler $curlHandler, DBConnection $db)
    {
        $this->curlHandler = $curlHandler;
        $this->db = $db;
    }

    public function processBreedData($breed) : array
    {
        $result = [];
        $placeholder = [];
        if (!$this->successApiRequest($breed)) {
            return ['errorMessage' => 'Not successful'];
        } else {
            foreach ($breed["message"] as $key => $value) {
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

    public function successApiRequest($breed)
    {
        if ($breed["status"] === "success"){
            return true;
        } else {
            return false;
        }
    }

    public function createImageUrlWithId($breeds)
    {
        $result = [];
        $placeholder = [];
        foreach ($breeds as $breed) {
            $placeholder['id'] = $breed['id'];
            $main = $breed['breed_name'];
            if (strlen($breed['sub_breed']) > 0) {
                $sub = $breed['sub_breed'];
                $placeholder['urlRequest'] = 'https://dog.ceo/api/breed/'.$main.'-'.$sub.'/images';
            } else {
                $placeholder['urlRequest'] = 'https://dog.ceo/api/breed/'.$main.'/images';
            }
            array_push($result, $placeholder);
        }
        return $result;
    }
    
}
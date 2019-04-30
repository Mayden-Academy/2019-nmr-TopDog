<?php

class DataProcessor
{
    public $curlHandler;
    public $db;

    public function __construct(CurlHandler $curlHandler, DBConn $db)
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


}
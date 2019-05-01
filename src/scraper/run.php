<?php
require_once '../../vendor/autoload.php';

$dbConnection = new TopDog\Classes\DbConnection();
$ch = new TopDog\scraper\Classes\CurlHandler();
$request = new TopDog\scraper\Classes\APIGrabber($ch);
$dataProcessor = new TopDog\scraper\Classes\DataProcessor($request);
$dbHandler = new TopDog\Classes\DbHandler($dbConnection);
$arrayBreeds = $dataProcessor->processBreedData();
foreach ($arrayBreeds as $breed) {
    $dbHandler->insertBreed($breed['breed_name'], $breed['sub_breed']);
}
$breeds = $dbHandler->getBreed();
$urlRequests = $dataProcessor->createImageUrlWithId($breeds);
$arrayImages = $dataProcessor->processImageData($urlRequests);
foreach ($arrayImages as $images) {
    foreach ($images['urlImages'] as $url) {
        $dbHandler->insertImages($arrayImages['id'], $url);
    }
}
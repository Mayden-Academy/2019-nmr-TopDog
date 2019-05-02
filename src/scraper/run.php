<?php
require_once '../../vendor/autoload.php';

$dbConnection = new TopDog\Classes\DbConnection();
$dbHandler = new TopDog\Classes\DbHandler($dbConnection);

$ch = new TopDog\scraper\Classes\CurlHandler();
$apiGrab = new TopDog\scraper\Classes\APIGrabber($ch);

$dataProcessor = new TopDog\scraper\Classes\DataProcessor($apiGrab, $dbHandler);

$dataProcessor->scrapeDogApi();

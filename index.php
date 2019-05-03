<?php
require_once __DIR__ . '/vendor/autoload.php';

$postGlobal = $_POST;
$db = new \TopDog\Classes\PDOConnection();
$dbHandler = new \TopDog\Classes\DbHandler($db);
$dropdownMaker = new \TopDog\Classes\DropdownMaker();
$formHandler = new \TopDog\Classes\FormHandler($postGlobal);
$dogDisplayer = new \TopDog\Classes\DogDisplayer();
$dogManager = new \TopDog\Classes\DogManager($dbHandler, $dropdownMaker, $formHandler, $dogDisplayer);

if(isset($_POST["Breeds"])) {
    $dogManager->formGetId();
    $dogManager->populateDogs();
    $dogManager->getFaveId();
    $dogManager->setFavouriteDog();
    $dogImagesOutput = $dogManager->displayDogs();
}

//if(isset($_POST["favDogId"])) {
//    $dogManager->favouriteDogData();
//    $dogManager->getFaveId();
//    $dogManager->faveToDb();
//    $dogManager->formGetId();
//    $dogManager->populateDogs();
//    $dogManager->setFavouriteDog();
//    $dogImagesOutput = $dogManager->displayDogs();
//}

$dogManager->getBreeds();
$dropdownOutput = $dogManager->makeDropdown();

?>

<html lang="en">
<head>
    <title>Top Dog</title>
    <link href='styles/normalize.css' rel='stylesheet'>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>

<h1>Top Dog</h1>

<form method="POST">
    <select name="Breeds" title="Breeds">
        <option>Choose your breed!</option>
        <?php
        if (isset($dropdownOutput)) {
            echo $dropdownOutput;
        }
        ?>
    </select>
    <input type="submit">
</form>

<main class="dog-house">
    <?php
        if(isset($dogImagesOutput)) {
            echo $dogImagesOutput['faveDog'];
            echo $dogImagesOutput['dogs'];
        }
    ?>
</main>

</body>
</html>
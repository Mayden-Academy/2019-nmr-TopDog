<?php
require_once __DIR__ . '/vendor/autoload.php';
?>

<html lang="en">
<head>
    <title>Top Dog</title>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>

<h1>Top Dog</h1>

<form>
    <select class="breedDropdown" name="Breeds" title="Breeds">
        <option>Choose your breed!</option>
        <?php
        ?>
    </select>
    <input type="submit">
</form>

<div class="favouriteDogContainer">
    <?php
    ?>
</div>

<main class="dogHouse">
    <?php
    ?>
</main>

</body>
</html>
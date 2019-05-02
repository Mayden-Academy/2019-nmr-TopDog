<?php
require_once __DIR__ . '/vendor/autoload.php';

?>

<html lang="en">
<head>
    <title>Top Dog</title>
    <link href='styles/normalize.css' rel='stylesheet'>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>

<h1>Top Dog</h1>

<form>
    <select name="Breeds" title="Breeds">
        <option>Choose your breed!</option>
        <?php
            if (isset($dropDown)) {
                echo $dropDown;
            };
        ?>
    </select>
    <input type="submit">
</form>

<main class="dog-house">
    <?php

        if (isset($dogContent)) {
            echo $dogContent;
        };
    ?>
</main>

</body>
</html>
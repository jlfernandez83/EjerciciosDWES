<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__.'/src/functions.php');

$coches = getCSVContentInArray(__DIR__.'/data_source/coches.csv');

$output = getCochesMarkupFromData($coches);

echo $output;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $output; ?>
</body>
</html>
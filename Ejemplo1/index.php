<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__.'/src/functions.php');

$coches = getCSVContentInArray(__DIR__.'/data_source/coches.csv');

//$outputCoches = getCochesMarkupFromData($coches);

include(__DIR__.'/templates/html.tpl.php');

?>
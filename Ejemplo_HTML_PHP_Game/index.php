<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__.'/src/functions.php');


$board = [

];

$boardMarkup = getBoardMarkup($board);

include(__DIR__.'/templates/index.tpl.php');

?>
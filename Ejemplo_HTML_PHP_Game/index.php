<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__.'/src/functions.php');


$board = [
 ['grass', 'water'],
 ['water', 'grass'],
 ['water', 'grass'],
 ['water', 'grass'],
];

$num_rows = count($board);
$num_columns = count($board[0]);

$board_markup = getBoardMarkup($board);

include(__DIR__.'/templates/index.tpl.php');

?>
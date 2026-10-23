<?php
//Inicialización entorno
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Includes
include(__DIR__.'/src/vars.php');
include(__DIR__.'/src/functions.php');
dump(PISTAS_VALIDAS);
//Plantlla
include(__DIR__.'/src/templates/reservar.tpl.php');
?>

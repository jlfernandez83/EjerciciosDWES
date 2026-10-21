<?php

//Inicialización entorno
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de constantes
define('PISTAS_VALIDAS', array('Pádel 1', 'Pádel 2', 'Baloncesto', 'Tenis'));

//Includes
include(__DIR__.'/src/functions.php');
//Obtengo todas las reservas
$reservas = getCSVData(__DIR__.'/src/data/reservas.csv');

//Obtengo filtros, si los hay
$filtros = getValidFiltersFromQueryString();

//Las filtro, si hay filtros
if(!empty($filtros)){
    $reservas = array_filter($reservas, function($reserva) use($filtros){
        return filtraFechaPista($reserva, $filtros);
    });
}

include(__DIR__.'/src/templates/index.tpl.php');
?>
<?php
//Inicialización entorno
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Includes
include(__DIR__.'/src/vars.php');
include(__DIR__.'/src/functions.php');

if(($_SERVER['REQUEST_METHOD'] === 'POST')&&(isset($_POST['nueva_reserva']))){
    //Proceso la petición
      //Validación de datos
    $datosValidos = validateNuevaReservaInput();
    //Si los datos son válidos, grabamos la reserva.
    //TODO
}

//Plantlla
include(__DIR__.'/src/templates/reservar.tpl.php');
?>

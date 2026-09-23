<?php

function dump($var){
  echo '<pre>'.print_r($var,1).'</pre>';
}


function getCSVContentInArray(String $rutaCSV){
  //TODO: Mejora esta función para poder elegir el campo que funciona del clave;

  $contenidoArchivo = file_get_contents($rutaCSV);
  $contenidoArchivo = trim($contenidoArchivo);
  $lineasCSV =explode("\n",$contenidoArchivo);

  $encabezadoCadena = reset($lineasCSV);
  $encabezadoArray = explode(',', $encabezadoCadena);

  $encabezadoArrayNuevo = array_map('trim',$encabezadoArray);

  $coches = [];

  foreach($lineasCSV as $clave => $linea){
    if($clave != 0){
      $camposLinea = explode(',', $linea); 

      $coche = array_combine($encabezadoArrayNuevo,$camposLinea);

      $coches[]= $coche; 
    }  
  }
  return $coches;
}

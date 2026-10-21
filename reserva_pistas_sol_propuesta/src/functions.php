<?php

use function PHPSTORM_META\type;

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}
function getCSVData($path){
    $data = [];
    if (($filehandler = fopen($path, "r")) !== false) {
        $cabeceras = fgetcsv($filehandler);

        while (($fields = fgetcsv($filehandler)) !== false) {
            $data[]= array_combine($cabeceras,$fields);
        }
    
        fclose($filehandler);
        return $data;
    }
    return null;
}

/**
 * Functión que devuelve un array con los filtros presentes en la query string. Si no se han establecido, devuelve un array vacío si no hay filtros;
 * 
 * @return array $filter Los filtros presentes en la query string
 */

function getValidFiltersFromQueryString(){
    $filters = [
        'pista' => FILTER_UNSAFE_RAW,
        'fecha'   => FILTER_UNSAFE_RAW,
    ];

    $filtrosSinValidar = filter_input_array(INPUT_GET, $filters);
    
    //Validamos
    
    _validateFilterPista($filtrosSinValidar);
    _validateFilterFecha($filtrosSinValidar);

    return $filtrosSinValidar;
    
}

function filtraFechaPista($reserva, $filtro){    
    $pasaFiltroPista = true;
    $pasaFiltroFecha = true;
    //Si está establecido filtro pista...
    if(isset($filtro['pista'])){
        if(($reserva['pista'] !== $filtro['pista'])){
            $pasaFiltroPista = false;
        }
    }
    //Si el filtro tiene fecha, filtramos la fecha
    if(isset($filtro['fecha'])){
        if(($reserva['fecha'] !== $filtro['fecha'])){
            $pasaFiltroFecha = false;
        }
    }
    return $pasaFiltroPista&&$pasaFiltroFecha;
}


/**Función auxiliar de validación de pista */
function _validateFilterPista(&$filtro){    
    if(isset($filtro['pista'])
        &&!empty($filtro['pista'])
        &&(in_array($filtro['pista'], PISTAS_VALIDAS))){
        return;
    }else{
        unset($filtro['pista']);
    }
}
/**Función auxiliar de validación de fecha */
function _validateFilterFecha(&$filtro){
    if(isset($filtro['fecha'])
        &&!empty($filtro['fecha'])
        ){
            $dateArray = explode('-',$filtro['fecha']);
            
            if((count($dateArray)===3)
                &&(is_numeric($dateArray[2]))
                &&(is_numeric($dateArray[1]))
                &&(is_numeric($dateArray[0]))
                &&(checkdate($dateArray[1], $dateArray[2], $dateArray[0]))){
                
                //La fecha es correcta
                return;
            }
        }
        
        unset($filtro['fecha']);
}
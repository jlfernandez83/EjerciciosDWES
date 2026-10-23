<?php

use function PHPSTORM_META\type;

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

function getPersistentData($dataSource, $origin){

    switch($origin){
        case 'db':
            return _getDBData($dataSource);
        break;
        case 'file':
            return _getCSVData($dataSource);
        default:
            return null;
    }
}
function _getDBData($dbConnectionParameters){
    $data = [];
    $dbh =  new PDO(
        $dbConnectionParameters['dsn'],
        $dbConnectionParameters['username'],
        $dbConnectionParameters['password'],
    );
    if($dbh){
        $sth = $dbh->prepare('SELECT * FROM reserva');
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            unset($row['id']);
            $row['material']=$row['material']??'';
            $data[]=$row; 
        }
        return $data;
    }
    $dbh = null;
}
function _getCSVData($path){
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

function validateNuevaReservaInput(){
    $datosValidos = [
        'nombre' => _validateNombreNuevaReserva(),
        'email' => _validateEmailNuevaReserva(),
        'pista' => _validatePistaNuevaReserva(),
        'fecha' => _validateFechaNuevaReserva(),
        'hora' =>  _validateHoraNuevaReserva(),
        'material' => _validateMaterialNuevaReserva(),
        'normas' => _validateNormasNuevaReserva()
    ];
    return $datosValidos;
}
function _validateEmailNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => 'Email@example.com'
    ];
}
function _validatePistaNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => 'Baloncesto'
    ];
}
function _validateFechaNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => '2026-05-05'
    ];
}
function _validateHoraNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => 'Email@example.com'
    ];
}
function _validateMaterialNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => 'peto'
    ];
}
function _validateNormasNuevaReserva(){
    //TODO
    return [
        'valido' => true,
        'value' => 'true'
    ];
}
function _validateNombreNuevaReserva(){
    if($nombre = filter_input(INPUT_POST,'nombre')){
        //Establecemos validaciones adicionales;
        if(strlen($nombre)<3){
            return [
                'valido' => false,
                'mensaje' => 'El nombre debe tener más de 2 caracteres',
                'value' => $nombre
            ];
        }
        if(strlen($nombre)>60){
            return [
                'valido' => false,
                'mensaje' => 'El nombre debe tener como máximo 60 caracteres',
                'value' => $nombre
            ];
        }
        //Aquí llega si el nombre es válido
        return [
            'valido' => true,
            'value' => $nombre
        ];
    }else{
        return [
                'valido' => false,
                'mensaje' => 'La reserva debe tener un nombre',
                'value' => $nombre
            ]; 
    }
    
}
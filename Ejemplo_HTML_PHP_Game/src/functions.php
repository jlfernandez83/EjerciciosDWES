<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

function getBoardFromCsv(String $rutaCSV)
{
    $stream = fopen($rutaCSV, 'r');
    $tablero = [];


    if ($stream !== false) {

        while (($fila = fgetcsv($stream)) !== false) {
            $tablero[] = array_map('trim',$fila);
        }

        fclose($stream);
    }

    return $tablero;
}

function getBoardMarkup($board_data){
    $output = '<div class="board-container">';
    foreach($board_data as $fila){
        foreach ($fila as $tile_value){
            $output .= '<div class="tile '.$tile_value.'-tile"></div>';
        }
    }
            
    $output .= '</div>';

    return $output;
}

?>
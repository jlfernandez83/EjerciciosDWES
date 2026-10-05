<?php

function dump($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function getLinkPosFromQS($num_rows,$num_columns){

    $options_left = ['options'=> ['default'=>1, 'min_range'=>0, 'max_range'=>$num_columns]];
    $options_top = ['options'=> ['default'=>1, 'min_range'=>0, 'max_range'=>$num_rows]];

    $left = filter_input(INPUT_GET,'link_left_pos',FILTER_VALIDATE_INT,$options_left);
    $top = filter_input(INPUT_GET,'link_top_pos',FILTER_VALIDATE_INT,$options_top);

    return ['left' => $left, 'top' => $top];
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
    //Metemos también a link
    $output .= '<div class="character link"></div>';
    $output .= '</div>';

    return $output;
}

?>
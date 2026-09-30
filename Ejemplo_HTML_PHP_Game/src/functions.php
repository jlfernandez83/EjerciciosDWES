<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
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
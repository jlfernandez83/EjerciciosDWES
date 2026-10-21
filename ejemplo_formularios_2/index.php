<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function dump($var){
    echo '<pre>'.print_r($var, 1).'</pre>';
}
function validate_materiales($var){
    $valoresPosibles = ['silicona', 'pvc'];
    if(in_array($var,$valoresPosibles)){
        return $var;
    }
}


$materiales = filter_input(INPUT_GET, 'materiales', FILTER_CALLBACK, ['options' => 'validate_materiales']);

dump($materiales);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <fieldset>
            <legend>Materiales</legend>
            <label for="mat_silicona">Silicona</label>
            <input type="checkbox" name="materiales[]" id="mat_silicona" value="silicona">
            <label for="mat_pvc">PVC</label>
            <input type="checkbox" name="materiales[]" id="mat_pvc" value="pvc">
        </fieldset>
        <button>Enviar materiales</button>
    </form>
</body>
</html>
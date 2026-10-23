<?php

/**
    @var array $datosValidos es un array que está disponible cuando el usuario está haciendo un intento de reserva
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de pistas</title>
</head>
<body>
    <!--Ponemos los errores -->
    <?php if(isset($datosValidos)): ?>
        <div class="erroresContainer"><ul>
        <?php foreach($datosValidos as $nombreCampo => $inforValores): ?> 
            <?php if(!$inforValores['valido']): ?>
            <li><?php echo htmlspecialchars($inforValores['mensaje']); ?></li>
            <?php endif; ?> 
        <?php endforeach; ?>
        </ul>
        </div>
    <?php endif; ?>
    <fieldset><legend>Nueva reserva</legend>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="nombre">Nombre: </label><input id="nombre" type="text" name="nombre" value="<?php echo ($datosValidos['nombre']['value'])? htmlspecialchars($datosValidos['nombre']['value']):''; ?>">
        <label for="email">Email: </label><input id="email" type="email" name="email">
        <label for="pista">Pista: </label>
        <select id="pista" name="pista">
            <?php foreach(PISTAS_VALIDAS as $pista): ?>
                <option value="<?php echo htmlspecialchars($pista); ?>"><?php echo htmlspecialchars($pista); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="fecha">Fecha: </label>
        <input id="fecha" type="date" name="fecha">
        <fieldset>
            <legend>Hora</legend>
            <?php foreach(HORAS_VALIDAS as $horaValida): ?>
                <input id="hora_<?php echo htmlspecialchars($horaValida); ?>" type="radio" name="hora" value="<?php echo htmlspecialchars($horaValida); ?>"><label for="hora_<?php echo htmlspecialchars($horaValida); ?>"><?php echo htmlspecialchars($horaValida); ?></label>
            <?php endforeach; ?>
        </fieldset>
        <fieldset>
            <legend>Material</legend>
            <?php foreach(MATERIALES_VALIDOS as $material):?>
                <input id="mat_<?php echo htmlspecialchars($material); ?>" type="checkbox" name="material[]" value="<?php echo htmlspecialchars($material); ?>"><label for="mat_<?php echo htmlspecialchars($material); ?>"><?php echo ucfirst(htmlspecialchars($material)); ?></label>
            <?php endforeach; ?>
        </fieldset>
        <input type="checkbox" id="normas_aceptadas" value="normas_aceptadas"><label for="normas_aceptadas">Acepto que vendas mi alma al diablo</label>
        <br>
        <button type="submit" name="nueva_reserva" value="nueva_reserva">Hacer reserva</button>
    </form>
    </fieldset>
</body>
</html>
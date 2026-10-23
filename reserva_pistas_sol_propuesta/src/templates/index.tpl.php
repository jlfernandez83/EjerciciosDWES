<?php

/**
 * @var array $reservas 
 * Array con la lista de reservas
 * 
 *  @var array $filtros
 * Array con los filtros válidos presentes, si los hay.
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">-->
    <title>Listado reservas</title>
</head>

<body>
    <h1>Lista de reservas</h1>
    <form method="get" action="./">
        <fieldset>
            <legend>Filtros</legend>
            <label for="filtroPista">Pista</label>
            <select name="pista" id="filtroPista">
                <option value="" selected>Seleccionar...</option>
                <?php foreach(PISTAS_VALIDAS as $pista): ?>
                    <option 
                        <?php echo (isset($filtros['pista'])&&($filtros['pista']===$pista))? 'selected':''; ?>
                        value="<?php echo htmlspecialchars($pista) ?>"><?php echo htmlspecialchars($pista); ?></option>
                <?php endforeach ?>
            </select>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo (isset($filtros['fecha']))? $filtros['fecha']: ''; ?>">
            <button type="submit">Filtrar</button>
            <button><a href="./">Reset</a></button>
        </fieldset>

    </form>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Pista</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Material</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <?php foreach ($reserva as $campoReserva): ?>
                        <td><?php echo htmlspecialchars($campoReserva); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="./reservar.php">Nueva reserva</a>
</body>

</html>
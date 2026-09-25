<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($coches)): ?>
        <ul>
        <?php foreach($coches as $clave => $valor ): ?>
            <li><?=  $valor['marca']; ?></li>
        <?php endforeach ?>
        </ul>
    <?php endif ?>
</body>
</html>
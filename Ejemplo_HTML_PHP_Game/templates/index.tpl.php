<?php 
/** @var String $num_columns
 *  @var String $num_rows
 *  @var String $board_markup 
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/zelda-botw.css">
    <title>Zelda 40th Anniversary Board Game</title>
    <style>
        main{
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .board-container{
            background-color: red;
            /*width: '<?php echo $num_columns*16 ?>px';
            height: '<?php echo $num_rows*16 ?>px';*/
            display:grid;
            grid-template-columns: repeat(<?php echo $num_columns; ?>,16px);
            grid-template-rows: repeat(<?php echo $num_rows; ?>,16px);

        }
        .controls-container{
            background-color: blue;
            width: 215px;
            height: 215px;
        }
        .tile{
            background-color:yellow;
            background-image: url(./public/img/zelda_stage_bg.png);
        }


        .grass-tile {
            background-position-x: -86px;
            background-position-y: -86px;
        }

        .water-tile {
            background-position-x: -18px;
            background-position-y: -35px;
        }

        .wall-tile {
            background-position-x: -69px;
            background-position-y: -35px;
        }

        .bush-tile {
            background-position-x: -69px;
            background-position-y: -52px;
        }

    </style>
</head>
<body>
    <main>
        <h1>Zelda 40th Anniversary</h1>
        <?php echo $board_markup; ?> 
        <div class="controls-container">

        </div>
    </main>
    
</body>
</html>
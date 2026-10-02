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
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .board-container {
            background-color: red;
            /*width: '<?php echo $num_columns * 16 ?>px';
            height: '<?php echo $num_rows * 16 ?>px';*/
            display: grid;
            grid-template-columns: repeat(<?php echo $num_columns; ?>, 16px);
            grid-template-rows: repeat(<?php echo $num_rows; ?>, 16px);

        }

        .controls-container {
            background-color: blue;
            width: 215px;
            height: 215px;
        }

        .tile {
            background-color: yellow;
            background-image: url(./public/img/zelda_stage_bg.png);
        }


        /* ── Fila 0 ─────────────────────────────── */
        .door-brown-tile {
            background-position: -1px -1px;
        }

        .stairs-corner-tile {
            background-position: -18px -1px;
        }

        .stairs-tile {
            background-position: -35px -1px;
        }

        .sand-1-tile {
            background-position: -52px -1px;
        }

        .sand-2-tile {
            background-position: -69px -1px;
        }

        .sand-3-tile {
            background-position: -86px -1px;
        }

        /* ── Lago (3x3) ─────────────────────────── */
        .water-top-left-tile {
            background-position: -1px -18px;
        }

        .water-top-tile {
            background-position: -18px -18px;
        }

        .water-top-right-tile {
            background-position: -35px -18px;
        }

        .water-left-tile {
            background-position: -1px -35px;
        }

        .water-tile {
            background-position: -18px -35px;
        }

        .water-right-tile {
            background-position: -35px -35px;
        }

        .water-bottom-left-tile {
            background-position: -1px -52px;
        }

        .water-bottom-tile {
            background-position: -18px -52px;
        }

        .water-bottom-right-tile {
            background-position: -35px -52px;
        }

        /* Esquinas interiores (el nombre indica dónde queda el agua) */
        .water-inner-top-left-tile {
            background-position: -1px -69px;
        }

        .water-inner-top-right-tile {
            background-position: -18px -69px;
        }

        .water-inner-bottom-left-tile {
            background-position: -35px -69px;
        }

        .water-inner-bottom-right-tile {
            background-position: -52px -69px;
        }

        /* ── Bosque / acantilado verde ──────────── */
        .wall-top-left-tile {
            background-position: -52px -18px;
        }

        .wall-top-tile {
            background-position: -69px -18px;
        }

        .wall-top-right-tile {
            background-position: -86px -18px;
        }

        .wall-left-tile {
            background-position: -52px -35px;
        }

        .wall-tile {
            background-position: -69px -35px;
        }

        .wall-right-tile {
            background-position: -86px -35px;
        }

        .wall-bottom-left-tile {
            background-position: -52px -52px;
        }

        .wall-entrance-tile {
            background-position: -86px -52px;
        }

        /* ── Objetos sueltos ────────────────────── */
        .bush-tile {
            background-position: -69px -52px;
        }

        .bush-dry-tile {
            background-position: -69px -69px;
        }

        .tombstone-tile {
            background-position: -86px -69px;
        }

        .boulder-tile {
            background-position: -69px -86px;
        }

        .grass-tile {
            background-position: -86px -86px;
        }

        /* ── Montaña marrón ─────────────────────── */
        .rock-brown-top-left-tile {
            background-position: -1px -86px;
        }

        .rock-brown-top-tile {
            background-position: -18px -86px;
        }

        .rock-brown-top-right-tile {
            background-position: -35px -86px;
        }

        .rock-brown-bottom-left-tile {
            background-position: -52px -86px;
        }

        .rock-brown-left-tile {
            background-position: -1px -103px;
        }

        .rock-brown-tile {
            background-position: -18px -103px;
        }

        .rock-brown-right-tile {
            background-position: -35px -103px;
        }

        /* ── Montaña gris ───────────────────────── */
        .rock-grey-top-left-tile {
            background-position: -52px -103px;
        }

        .rock-grey-top-tile {
            background-position: -69px -103px;
        }

        .rock-grey-top-right-tile {
            background-position: -86px -103px;
        }

        .rock-grey-bottom-left-tile {
            background-position: -35px -120px;
        }

        .rock-grey-left-tile {
            background-position: -52px -120px;
        }

        .rock-grey-tile {
            background-position: -69px -120px;
        }

        .rock-grey-right-tile {
            background-position: -86px -120px;
        }

        /* ── Fila 7 (resto) ─────────────────────── */
        .stone-floor-tile {
            background-position: -1px -120px;
        }

        .door-green-tile {
            background-position: -18px -120px;
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
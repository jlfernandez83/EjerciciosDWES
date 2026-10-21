<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  try{
    $dbh = new PDO(
        'mysql:host=localhost;dbname=dwes;charset=utf8mb4', // DSN
        'dwes', // usuario
        'abc123.', // contraseña
        [ // opciones
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    $serverVersion = $dbh->getAttribute(PDO::ATTR_SERVER_VERSION);

    echo '<br>';

    foreach($dbh->query('SELECT cod, nombre, tlf FROM tienda ORDER BY nombre') as $valor){
        var_dump($valor);
        echo '<br>';
    }

    


    $dbh = null;

  }catch(Exception $e){
    echo 'Se lanzo una excepción:  '. $e->getMessage();
  }


?>
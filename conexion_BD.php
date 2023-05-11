<?php

    #Variables para entrar a la base de datos
    $nameserver = "localhost";
    $username = "adrian";
    $password = "12345";
    $database = "usuarios"; 

    $conexion = new msqli($nameserver, $username, $password, $database, "");
    $conexion->set_charset("utf8");

    if(!$conexion) {
        die("Conexion fallidaa ".mysqli_connect_error());
    } else {
        echo "Conexion con exito";
    }
?>
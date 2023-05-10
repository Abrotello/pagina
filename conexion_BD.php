<?php

    #Variables para entrar a la base de datos
    $nameserver = "localhost";
    $username = "adrian";
    $password = "12345";
    $database = "usuarios"; 

    $conexion = new msqli($nameserver, $username, $password, $database, "");
    $conexion->set_charset("utf8");
?>
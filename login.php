<?php

    include_once 'conexion_BD.php';

    if($conexion) {
        session_start();

        $iName = $_POST['name'];
        $iPasswd = $_POST['contrasena'];

        $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre = '$iName' AND contrasena = '$iPasswd'");
        
        if($consulta) {
            $rowcount = mysqli_num_rows($consulta);

            if($rowcount != 0) {
                header('Location: principal.html');
            }

        } else {
            echo 'Error en la consulta.'.mysqli_connect_error();
            header('Location: index.html');
        }

    } else {
        echo 'Error en la conexion a la base de datos '.  msqli_connect_error();
        exit(); 
    }

?>
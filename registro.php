<?php

include_once("conexion_BD.php");

if(!$conexion) {
    echo "Error en la conexion en la base de datos " . mysqli_connect_error(); 
} else {
    #Declarar variables
    $Nombre=$_POST['nombre'];
    $Apellidos=$_POST['apellidos'];
    $Usuario=$_POST['usuario'];
    $Passwd=$_POST['contra'];
    $Confirm_Passwd=$_POST['conf_contra'];

    if($Passwd == $Confirm_Passwd) {

        $sql = $conexion->query("INSERT INTO usuario(nombre,apellidos,usuario,contrasena,confirmar_contrasena) VALUES('$Nombre','$Apellidos','$Usuario','$Passwd','$Confirm_Passwd')");

        if(!$sql) {
            echo "Error en la consulta" . mysqli_connect_error();
        } else {
            echo "Usuario registrado";
            header('location:index.html');
        }

    } else {
        echo "Las contraseñas no coinciden";
    }
}


?>
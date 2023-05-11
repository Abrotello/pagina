<?php

include_once('conexion_BD.php');

if(!empty($_POST["btnIngresar"])) {
    if(empty($_POST["name"]) and empty($_POST["contrasena"])) {
        echo "Los campos estan vacios";
    } else {

        session_start();

        $iName = $_POST['name'];
        $iPasswd = $_POST['contrasena'];

        $_SESSION["usuario"] = $iName;
        $_SESSION["password"] = $iPasswd; 

        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario = '$iName' AND contrasena = '$iPasswd'");

        if($datos = $sql->fetch_object()) {
            header("location:principal.html");
        } else {
            echo "El usuario no existe";
        }

    }
}

msqli_close($conexion);

?>

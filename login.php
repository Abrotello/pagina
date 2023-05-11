<?php

include("conexion_BD.php");

$nombre = $_POST["name"];
$password = $_POST["contrasena"];

//Login
if(isset($_POST["btnIngresar"])) {
    
    $sql = msqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$nombre' AND contrasena = '$password'");
    $nr = mysqli_num_rows($sql);

    if($nr==1) {
        echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
    } else {
        echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
    }

}

$Name = $_POST['nombre'];
$Apellidos = $_POST['apellidos'];
$Usuario = $_POST['usuario'];
$Passwd = $_POST['contra'];
$Confirm_Passwd = $_POST['conf_contra'];


//Registro
if(isset($_POST["btnRegistrar"])) {
    if($Passwd == $Confirm_Passwd) {
        
        $sqlDatos = "INSERT INTO usuario(nombre,apellidos,usuario,contrasena,confirmar_contrasena) VALUES('$Name','$Apellidos','$Usuario','$Passwd','$Confirm_Passwd ')";

        if(mysqli_query($conexion,$sqlDatos)) {
            echo "<script> alert('Usuario registrado'); window.location='index.html' </script>";
        } else {
            echo "Error: ".$sql."<br>".mysql_error($conexion);
        }
    }
}

?>
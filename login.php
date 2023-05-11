<?php

$nameserver = "localhost";
$username = "adrian";
$password = "12345";
$database = "usuarios"; 

$conexion = mysqli_connect($nameserver, $username, $password, $database);

f(!$conexion) {
    die("Conexion fallidaa ".mysqli_connect_error());
} else {
    echo "Conexion con exito";
} 

$nombre = $_POST["name"];
$passwd = $_POST["contrasena"];

//Login
if(isset($_POST["btnIngresar"])) {
    
    echo "Se presiono el boton";

    $sql = "SELECT * FROM registros WHERE usuario = '$nombre' AND contrasena = '$passwd'";
    $resultado = mysqli_query($conexion,$sql);

    echo "Se hizo la consulta";

    if(mysqli_num_rows($resultado)==1) {
        session_start();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['passwd'] = $passwd;
        echo "<script> alert('Bienvenido: $nombre'); window.location='principal.html' </script>";
        #header("Location:principal.html");
    } else {
        echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
        #header("Location:index.html");
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
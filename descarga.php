<?php

include_once("conexion_BD.php");

require("fpdf/fpdf.php");

session_start();

$Usuario = $_SESSION["usuario"];
$Password = $_SESSION["password"];

if(!isset($Usuario)) {
    header("Location:index.html");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    $sql = $conexion->query("INSERT INTO formulario(nombre,telefono,correo,mensaje) VALUES('$nombre','$telefono','$correo','$mensaje')");

    if($sql) {
        $pdf = new FPDF();
        $pdf->AddPage();

        #Datos del formulario al pdf
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Nombre: '.$nombre);
        $pdf->Ln();
        $pdf->Cell(40,10,'Telefono: '.$telefono);
        $pdf->Ln();
        $pdf->Cell(40,10,'Correo: '.$correo);
        $pdf->Ln();
        $pdf->Cell(40,10,'Mensaje: '.$mensaje);
        $pdf->Ln();

        $pdf->Output('F','/home/formulario.pdf');
        exec("sshpass -p 12345 scp -v /home/formulario.pdf root@10.20.30.12:/var/www/webdav/descargas");

    } else {
        echo "Ocurrio un error";
    }
    msqli_close($conexion);
}

?>
<?php
 header('Access-Control-Allow-Origin: *'); 
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 
 global $datos; 
 
 require("db.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

 $conexion = conexion(); // CREA LA CONEXION
 // REALIZA LA QUERY A LA DB
 //$registros = mysqli_query($conexion, "SELECT * FROM trabajador");
 
 // RECORRE EL RESULTADO Y LO GUARDA EN UN ARRAY 
/* while ($resultado = mysqli_fetch_array($registros))  
 
 {
   $datos[] = $resultado;
 }

 $json = json_encode($datos); */
 /////

$peso = $_POST['Peso'];
$tamaño = $_POST['Tamaño'];
$Nd = $_POST['Nombre_Destinatario'];
$destino = $_POST['Destino'];
//$idunidad = $_POST['idUnidad']; 
$salida = $_POST['FechaHora_Salida'];
$llegada = $_POST['FechaHora_Llegada'];


$insertar2= "INSERT INTO envio_paquete (Peso,Tamaño, Nombre_Destinatario,Destino, FechaHora_Salida,FechaHora_Llegada) VALUES ('$peso','$tamaño','$Nd', '$destino', '$salida', '$llegada')";

$query2 = mysqli_query( $conexion,$insertar2);
?>
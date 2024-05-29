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
$Name = $_POST['Nombre'];
$Lname = $_POST['Apellido'];
$Phone = $_POST['Telefono'];
$Payment = $_POST['Metodo_Pago'];
$Total = $_POST['Cantidad'];
$DateTime = $_POST['Fecha_Pago'];
//$peso = $_POST['Peso'];
//$tamaño = $_POST['Tamaño'];
//$Nd = $_POST['Nombre_Destinatario'];
//$destino = $_POST['Destino'];
//$idunidad = $_POST['idUnidad']; 
//$salida = $_POST['FechaHora_Salida'];
//$llegada = $_POST['FechaHora_Llegada'];

$insertar= "INSERT INTO cliente (Nombre,Apellido,Telefono, Metodo_Pago, Cantidad, Fecha_Pago) VALUES ('$Name', '$Lname', '$Phone', '$Payment', '$Total', '$DateTime')";
$query = mysqli_query( $conexion, $insertar);
//$insertar1= "INSERT INTO paquete (Peso, Tamaño) VALUES ('$peso', '$Tamaño')";
//$query1 = mysqli_query( $conexion,$insertar1);
//$insertar2= "INSERT INTO envio_paquete (Nombre_Destinatario,Destino,idUnidad, FechaHora_Salida,FechaHora_Llegada) VALUES ('$Nd', '$destino', '$idunidad', '$salida', '$llegada')";
//$query2 = mysqli_query( $conexion,$insertar2);




?>
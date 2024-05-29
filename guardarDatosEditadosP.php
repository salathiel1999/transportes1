<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["idboleto"]) || 
	!isset($_POST["nombre"]) || 
	!isset($_POST["apellidos"]) || 
	!isset($_POST["origen"]) || 
	!isset($_POST["destino"]) || 
	!isset($_POST["fecha_hora"]) || 
	!isset($_POST["precio"])

) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$idboleto = $_POST["idboleto"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$origen = $_POST["origen"];
$destino = $_POST["destino"];
$fecha_hora = $_POST["fecha_hora"]; 
$precio = $_POST["precio"];

$sentencia = $base_de_datos->prepare("UPDATE boleto SET idboleto = ?, nombre = ?, apellidos = ?, origen = ?, destino = ?,fecha_hora = ?,precio = ?= ? WHERE idboleto = ?;");
$resultado = $sentencia->execute([$idboleto, $nombre, $apellidos, $origen, $destino, $fecha_hora,$precio]);

if($resultado === TRUE){
	header("Location: ./compraboletovista.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
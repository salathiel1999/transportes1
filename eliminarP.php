<?php
if(!isset($_GET["idpaquete"])) exit();
$idpaquete = $_GET["idpaquete"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM paquete WHERE idpaquete = ?;");
$resultado = $sentencia->execute([$idpaquete]);
if($resultado === TRUE){
	header("Location: ./enviarpaquetevista.php");
	exit;
}
else echo "Algo salió mal";
?>
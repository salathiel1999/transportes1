<?php
if(!isset($_GET["Id"])) exit();
$IdUnidad = $_GET["Id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE Id = ?;");
$resultado = $sentencia->execute([$Id]);
if($resultado === TRUE){
	header("Location: ./infoUsuarios.php");
	exit;
}
else echo "Algo salió mal";
?>
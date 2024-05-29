<?php
if(!isset($_GET["idunidad"])) exit();
$idunidad = $_GET["idunidad"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM unidad WHERE idunidad = ?;");
$resultado = $sentencia->execute([$idunidad]);
if($resultado === TRUE){
	header("Location: ./unidadvista.php");
	exit;
}
else echo "Algo salió mal";
?>
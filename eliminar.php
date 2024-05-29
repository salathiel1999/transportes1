<?php
if(!isset($_GET["idboleto"])) exit();
$idboleto = $_GET["idboleto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM boleto WHERE idboleto = ?;");
$resultado = $sentencia->execute([$idboleto]);
if($resultado === TRUE){
	header("Location: ./compraboletovista.php");
	exit;
}
else echo "Algo salió mal";
?>
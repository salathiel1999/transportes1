<?php
#Salir si alguno de los datos no está presente
//if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "db2.php"; //inculir el archivo de conexión

$nombre = $_POST["nombre"]; //escrinir minusculas , mayúsculas solo las palabaras reservadas ej. insert into
$apellidos = $_POST["apellidos"];
$origen = $_POST["origen"];
$destino = $_POST["destino"];
$hora_salida = $_POST["hora_salida"];
$fecha_hora = $_POST["fecha_hora"];
$precio = $_POST["precio"];
//$unidad;
//$idcliente;
//$idtrabajador;

//investigar consultas preparadas
$sentencia = $base_de_datos->prepare("INSERT INTO boleto (nombre,apellidos,origen,destino,fecha_hora,precio,hora_salida) VALUES (?, ?, ?, ?, ?,?,?);");
$resultado = $sentencia->execute([$nombre,$apellidos,$origen,$destino,$fecha_hora,$precio,$hora_salida]);

if($resultado === TRUE){
	header("Location: ./compraboletovista.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";



?>

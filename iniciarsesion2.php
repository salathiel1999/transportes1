<?php
// Conexión a la base de datos (reemplaza los valores según tu configuración)
$conexion = mysqli_connect('localhost','root','','transportes');
$USUARIO=$_POST ['usuario'];
$PASSWORD=$_POST ['contrasena'];

// Preparar la consulta SQL para seleccionar solo el nombre y la contraseña del cliente
$consulta = "SELECT* FROM aministrador where nombre = '$USUARIO' and contrasena = '$PASSWORD' ";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("location:index.html");
} else {
    include("iniciarsesion2.html");
?>
<div style="text-align: center;">
    <h1>ERROR USUARIO INCORRECTO </h1>
<?php
}

// Liberar el resultado y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

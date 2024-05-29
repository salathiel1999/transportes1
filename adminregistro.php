<?php
// Conexión a la base de datos (reemplaza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transportes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$idadmin = $_POST['idadmin'];

// Preparar la consulta SQL para insertar los datos en la tabla utilizando sentencias preparadas
$sql = "INSERT INTO aministrador (nombre, contrasena, idadmin)
VALUES ('$nombre', '$contrasena', '$idadmin')";

if ($conn->query($sql) === TRUE) {
    
    /*echo  " Boleto guardado exitosamente.";*/
    header("Location: iniciarsesion2.html");
    exit;
    
} else {
    include("adminregistro.php");
}
/*}*/

// Cierra la conexión con la base de datos
$conn->close();
?>

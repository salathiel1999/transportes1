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
$apellidos = $_POST['apellidos'];
$correo_electronico = $_POST['correo_electronico'];
$contrasena = $_POST['contrasena'];
$fecha_registro = $_POST['fecha_registro']; // Obtener la fecha actual

// Preparar la consulta SQL para insertar los datos en la tabla utilizando sentencias preparadas
$sql = "INSERT INTO clienteboleto (nombre, apellidos, correo_electronico, contrasena, fecha_registro)
VALUES ('$nombre', '$apellidos', '$correo_electronico', '$contrasena','$fecha_registro')";

if ($conn->query($sql) === TRUE) {
    
    /*echo  " Boleto guardado exitosamente.";*/
    header("Location: iniciarsesion.html");
    exit;
    
} else {
    echo "Error al guardar el boleto: " . $conn->error;
}
/*}*/

// Cierra la conexión con la base de datos
$conn->close();
?>

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
$tamano = $_POST['tamano'];
$peso = $_POST['peso'];
$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$destino = $_POST['destino'];
$hora_salida = $_POST['hora_salida'];
$hora_llegada = $_POST['hora_llegada'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO paquete (tamano, peso, remitente, destinatario, destino, hora_salida, hora_llegada)
VALUES ('$tamano', '$peso', '$remitente', '$destinatario', '$destino', '$hora_salida', '$hora_llegada')";


// Cierra la conexión con la base de datos

if ($conn->query($sql) === TRUE) {
    
    /*echo  "Guardado exitosamente.";*/
    header("Location: enviarpaquetevista.php");
    exit;
} else {
    echo "Error al guardar: " . $conn->error;
}
// Cierra la conexión con la base de datos
$conn->close();
?>
?>

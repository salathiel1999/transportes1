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
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$genero = $_POST['genero'];
$estado_civil = $_POST['estado_civil'];
$puesto = $_POST['puesto'];
$fecha_ingreso= $_POST ['fecha_ingreso'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO personal (nombre, apellidos, fecha_nacimiento, direccion, telefono, correo_electronico, genero, estado_civil, puesto,fecha_ingreso)
VALUES ('$nombre', '$apellidos', '$fecha_nacimiento', '$direccion', '$telefono', '$correo_electronico', '$genero', '$estado_civil', '$puesto','$fecha_ingreso')";

if ($conn->query($sql) === TRUE) {
    
    /*echo  " Boleto guardado exitosamente.";*/
    header("Location:adminregistro.html");
    exit;
    
} else {
    echo "Error al guardar el boleto: " . $conn->error;
}
/*}*/

// Cierra la conexión con la base de datos
$conn->close();
?>

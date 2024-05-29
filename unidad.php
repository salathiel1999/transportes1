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
$fecha_ingreso = $_POST['fecha_ingreso'];
$tipo_licencia = $_POST['tipo_licencia'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$matricula = $_POST['matricula'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO unidad (fecha_ingreso, tipo_licencia, marca, modelo, matricula)
VALUES ('$fecha_ingreso', '$tipo_licencia', '$marca', '$modelo', '$matricula')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Redirigir a la página de visualización de unidades después de guardar exitosamente
    header("Location: unidadvista.php");
    exit;
} else {
    echo "Error al guardar: " . $conn->error;
}

// Cierra la conexión con la base de datos
$conn->close();
?>

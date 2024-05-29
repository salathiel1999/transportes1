<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia localhost por la dirección de tu servidor si es diferente
$username = "root"; // Cambia root por el nombre de usuario de tu base de datos si es diferente
$password = ""; // Cambia por la contraseña de tu base de datos si es diferente
$dbname = "transportes"; // Cambia transportes por el nombre de tu base de datos si es diferente

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si se envió un formulario para reservar un nuevo asiento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $asiento = $_POST['asiento'];
    $fecha_hora = $_POST['fecha_hora'];
    $precio = $_POST['precio'];
    $pago = $_POST['pago'];
    $hora_salida = $_POST['hora_salida'];

    // Verificar si el asiento está ocupado
    $sql_check = "SELECT * FROM boleto WHERE asiento = '$asiento'";
    $result_check = $conn->query($sql_check);

        // Redireccionar a una página después de guardar exitosamente
       // header("Location: compraboleto.html");
        
    
    if ($result_check->num_rows > 0) {
        echo "El asiento seleccionado ya está ocupado. Por favor elige otro asiento.";
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql_insert = "INSERT INTO boleto (nombre, apellidos, origen, destino,asiento, fecha_hora,precio, pago, hora_salida)
        VALUES ('$nombre', '$apellidos', '$origen', '$destino', '$asiento', '$fecha_hora','$precio', '$pago', '$hora_salida')";

        if ($conn->query($sql_insert) === TRUE) {
            // Redireccionar a una página después de guardar exitosamente
            header("Location: miboleto.php");
            exit;
        } else {
            echo "Error al guardar: " . $conn->error;
        }
    }
}

// Cierra la conexión con la base de datos
$conn->close();
?>

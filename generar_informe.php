<?php
// Verificar si se ha enviado la fecha desde la solicitud AJAX
if(isset($_POST['fecha'])) {
    // Obtener la fecha seleccionada
    $fechaSeleccionada = $_POST['fecha'];

    // Aquí debes realizar la conexión a tu base de datos
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

    // Preparar la consulta SQL para seleccionar los registros de la tabla 'boleto' para la fecha seleccionada
    $sql = "SELECT * FROM boleto WHERE fecha_hora LIKE '$fechaSeleccionada%'";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Inicializar la variable que contendrá el HTML del informe
        $informeHTML = "";

        // Iterar sobre cada fila de resultados y construir las filas de la tabla
        while($row = $result->fetch_assoc()) {
            $informeHTML .= "<tr>";
            $informeHTML .= "<td>" . $row['idboleto'] . "</td>";
            $informeHTML .= "<td>" . $row['nombre'] . "</td>";
            $informeHTML .= "<td>" . $row['apellidos'] . "</td>";
            $informeHTML .= "<td>" . $row['origen'] . "</td>";
            $informeHTML .= "<td>" . $row['destino'] . "</td>";
            $informeHTML .= "<td>" . $row['fecha_hora'] . "</td>";
            $informeHTML .= "<td>" . $row['precio'] . "</td>";
            $informeHTML .= "<td>" . $row['pago'] . "</td>";
            $informeHTML .= "<td>" . $row['hora_salida'] . "</td>";
            $informeHTML .= "<td>";
            $informeHTML .= "<a href='editar.php?idboleto=" . $row['idboleto'] . "'><button>Editar</button></a>";
            // Agregamos un evento onclick para mostrar una confirmación antes de eliminar
            $informeHTML .= "<button onclick='confirmarEliminar(" . $row['idboleto'] . ")'>Eliminar</button>";
            $informeHTML .= "</td>";
            $informeHTML .= "</tr>";
        }
    } else {
        // Si no se encontraron registros para la fecha seleccionada
        $informeHTML = "<tr><td colspan='10'>No se encontraron registros para la fecha seleccionada</td></tr>";
    }

    // Cerrar conexión
    $conn->close();

    // Devolver el HTML del informe
    echo $informeHTML;
} else {
    // Si no se envió la fecha desde la solicitud AJAX
    echo "<tr><td colspan='10'>No se ha proporcionado una fecha</td></tr>";
}
?>

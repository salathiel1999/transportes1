<!DOCTYPE html>
<html lang="es">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">TRANSPORTES</span>TLAXIACO</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="indexcliente.html" class="nav-item nav-link active">Inicio</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cliente</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="" class="dropdown-item">Perfil</a>
                            <a href="clienteeditarperfil.html" class="dropdown-item">Editar Perfil</a>
                            <a href="" class="dropdown-item">Enviar Paquete</a>
                            <a href="compraboleto.html" class="dropdown-item">Comprar Boleto</a>
                            <a href="iniciarsesion.html" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div> <br>
    <!-- Navbar End -->
    <?php
// Verificar si se ha proporcionado el ID del boleto en la URL
if(isset($_GET['id'])) {
    // Obtener el ID del boleto de la URL
    $id_boleto = $_GET['id'];
    // Crear conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transportes";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    // Consulta SQL para obtener los detalles del boleto con el ID proporcionado
    $sql = "SELECT * FROM boleto WHERE idboleto = $id_boleto";
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los detalles del boleto
        while($row = $result->fetch_assoc()) {
            ?>
           
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Boleto</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato de Ticket</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket</title>
    <style>
        body {
            font-family: Courier, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .ticket-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .ticket {
            width: fit-content;
            margin: 0 auto; /* Centro horizontal */
            padding: 40px;
            border-radius: 20px;
            background: linear;
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.6);
            position: relative;
            overflow: hidden;
        }


        .ticket:before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(145deg, #ffffff, #e0e0e0);
            border-radius: 50%;
        }

        .ticket:after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(145deg, #ffffff, #e0e0e0);
            border-radius: 50%;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header img {
            max-width: 60px; /* Ajusta el tamaño del logo aquí */
            margin-bottom: 10px;
        }

        .ticket-header h5 {
            margin: 0;
            color: #333;
            font-size: 1.2em;
        }

        .ticket-table {
            width: 100%;
            margin-top: 10px;
        }

        .ticket-table th,
        .ticket-table td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .ticket-footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }

        .ticket-cut {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 20px;
            background: linear-gradient(to bottom right, transparent 50%, #fff 50%);
            z-index: 1;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            max-width: 80px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <img src="logo.png" alt="Logo de la compañía">
            <h5>TRANSPORTES TLAXIACO</h5>
        </div>
        <div class="ticket-body">
            <table class="ticket-table">
                <tr>
                    <th>Folio</th>
                    <td><?php echo $row['idboleto']; ?></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $row['nombre']; ?></td>
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td><?php echo $row['apellidos']; ?></td>
                </tr>
                <tr>
                    <th>Origen</th>
                    <td><?php echo $row['origen']; ?></td>
                </tr>
                <tr>
                    <th>Destino</th>
                    <td><?php echo $row['destino']; ?></td>
                </tr>
                <tr>
                    <th>Asiento</th>
                    <td><?php echo $row['asiento']; ?></td>
                </tr>
                <tr>
                    <th>Fecha y Hora</th>
                    <td><?php echo $row['fecha_hora']; ?></td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td><?php echo $row['precio']; ?></td>
                </tr>
                <tr>
                    <th>Tipo de Pago</th>
                    <td><?php echo $row['pago']; ?></td>
                </tr>
                <tr>
                    <th>Hora de Salida</th>
                    <td><?php echo $row['hora_salida']; ?></td>
                </tr>
            </table>
        </div>
        <div class="ticket-footer">
            <p>¡Gracias por viajar con nosotros!</p>
        </div>
        <div class="ticket-cut"></div>
        <div class="qr-code">
            <!-- Código QR generado dinámicamente -->
            <img src="pasajero.png" alt="Código QR">
        </div>
    </div>
</body>
</html>

            <?php
        }
    } else {
        echo "No se encontró el boleto con el ID proporcionado.";
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "ID de boleto no proporcionado en la URL.";
}
?>
    <!-- Botón de impresión -->
    <button onclick="printPDF()">Imprimir Boleto</button>
    </body>
    </html>

    <head>
    <!-- Otras etiquetas dentro del head -->
    <script>
        function printPDF() {
            window.print();
        }
    </script>
</head>
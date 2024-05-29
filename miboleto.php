<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TRANSPORTES</title>
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
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i></p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


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
                                <a href="" class="dropdown-item">Editar Perfil</a>
                                <a href="" class="dropdown-item">Historial</a>
                                <a href="iniciarsesion.html" class="dropdown-item">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">BOLETOS</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Booking Start -->
    <!-- Booking Start -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            white-space: nowrap; /* Evitar saltos de línea */
            overflow: hidden; /* Ocultar el desbordamiento */
            text-overflow: ellipsis; /* Mostrar puntos suspensivos en caso de desbordamiento */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Ajuste para la tabla */
        .container-fluid.booking {
            padding: 0px;
            background-color: #fff; /* Fondo blanco */
            text-align: center; /* Centrar el contenido */
        }

        .container-fluid.booking table {
            margin: 0 auto; /* Centrar la tabla */
        }
    </style>
</head>

<body>
    <!-- Contenido principal -->
 <div class="container-fluid booking mt-5 pb-5">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Asiento</th>
                <th>Fecha y Hora</th>
                <th>Precio</th>
                <th>Tipo de Pago</th>
                <th>Hora de Salida</th>
                <th>Acción</th> 
               
            </tr>
        </thead>
        <tbody>
<?php

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

// Verificar si se ha enviado el formulario para comprar el boleto
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

    // Preparar la consulta SQL para insertar el boleto en la tabla 'boleto'
    $sql = "INSERT INTO boleto (nombre, apellidos, origen, destino, asiento, fecha_hora, precio, pago, hora_salida)
            VALUES ('$nombre', '$apellidos', '$origen', '$destino', '$asiento', '$fecha_hora', '$precio', '$pago', '$hora_salida')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Boleto comprado correctamente.";
    } else {
        echo "Error al comprar el boleto: " . $conn->error;
    }
}

// Preparar la consulta SQL para seleccionar el último boleto comprado
$sql = "SELECT * FROM boleto ORDER BY idboleto DESC LIMIT 1";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idboleto'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['origen'] . "</td>";
        echo "<td>" . $row['destino'] . "</td>";
        echo "<td>" . $row['asiento'] . "</td>";
        echo "<td>" . $row['fecha_hora'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "<td>" . $row['pago'] . "</td>";
        echo "<td>" . $row['hora_salida'] . "</td>";
        echo "<td><a href='miboletoimprimir.php?id=" . $row['idboleto'] . "' class='btn btn-primary'>Imprimir</a></td>";
        
      
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No se encontraron registros</td></tr>";
}

// Cerrar conexión
$conn->close();
?>

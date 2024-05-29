

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
                        <p><i class="fa fa-envelope mr-2"></i>KARLAVO@GMAIL.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+529531118282</p>
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
                        <a href="index.html" class="nav-item nav-link active">Inicio</a>
                        
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            
                            <a href="personal.html" class="dropdown-item">Registro Personal</a>
                            <a href="" class="dropdown-item">Registro Unidad</a>
                            <a href="" class="dropdown-item">Historial</a>
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
                <h3 class="display-4 text-white text-uppercase">REGISTROS DE LAS UNIDADES</h3>
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
    <!-- Contenido del encabezado, barra de navegación, etc. -->

    <!-- Contenido principal -->
    <div class="container-fluid booking mt-5 pb-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Unidad</th>
                    <th>Fecha de Ingreso</th>
                    <th>Tipo de Licencia</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matrícula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
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

                // Consulta SQL para obtener los datos de la tabla de unidades
                $sql = "SELECT * FROM unidad";

                // Ejecutar la consulta
                $result = $conn->query($sql);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Iterar sobre cada fila de resultados
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['idunidad'] . "</td>";
                        echo "<td>" . $row['fecha_ingreso'] . "</td>";
                        echo "<td>" . $row['tipo_licencia'] . "</td>";
                        echo "<td>" . $row['marca'] . "</td>";
                        echo "<td>" . $row['modelo'] . "</td>";
                        echo "<td>" . $row['matricula'] . "</td>";
                        echo "<td>"; // Abre la celda para los botones

                        echo "<a href='editarU.php?idunidad=" . $row['idunidad'] . "'><button>Editar</button></a>";
                        echo "<a href='eliminarU.php?idunidad=" . $row['idunidad'] . "'><button>Eliminar</button></a>";
                        echo "</td>";               
                                 echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Booking End -->

    <!-- Agrega tus scripts JavaScript y jQuery aquí, si es necesario -->
    <!-- Bootstrap JS y jQuery (si es necesario) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
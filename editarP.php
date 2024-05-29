<?php
if(!isset($_GET["idpaquete"])) exit();
$idpaquete = $_GET["idpaquete"];
include_once "base_de_datos.php";
//Sentencia preparada (prepare)
//Primero una plantilla de la sentencia SQL se crea y se envía a la base de datos. 
//Algunos valores se dejan sin especificar, llamados parámetros y representados por un interrogante "?"
$sentencia = $base_de_datos->prepare("SELECT * FROM paquete WHERE idpaquete = ?;");
$sentencia->execute([$idpaquete]);
$datos1 = $sentencia->fetch(PDO::FETCH_OBJ);
if($datos1 === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?> 
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyecto pàgina</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
       
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Hola!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Reservar</a></li>
                        <li class="nav-item"><a class="nav-link" href="Contactos.html">Contactos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Paqueteria</h1>
                            
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                             <!--   <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        </section>

	<div class="text-center mb-5">
		<h2 class="fw-bolder">Editar producto con el ID <?php echo $datos1->idPaquete; ?></h2>
		<form method="post" action="guardarDatosEditadosP.php">
			<input type="hidden" name="idPaquete" value="<?php echo $datos1->idPaquete; ?>">
	
			<label for="idPaquete">ID:</label>
			<input value="<?php echo $datos1->idPaquete ?>" class="form-control" name="idPaquete" required type="text" id="idPaquete" placeholder="id del paquete">

			<label for="Peso">Peso:</label>
			<input value="<?php echo $datos1->Peso ?>" class="form-control" name="Peso" required type="number" id="Peso" placeholder="Peso del paquete">

			<label for="Tamaño">Tamaño:</label>
			<input value="<?php echo $datos1->Tamaño ?>" class="form-control" name="Tamaño" required type="text" id="Tamaño" placeholder="Tamaño del paquete">

			<label for="Nombre_Destinatario">Nombre del destinatario:</label>
			<input value="<?php echo $datos1->Nombre_Destinatario ?>" class="form-control" name="Nombre_Destinatario" required type="text" id="Nombre_Destinatario" placeholder="nombre del destinatario">

			<label for="Destino">Destino:</label>
			<input value="<?php echo $datos1->Destino ?>" class="form-control" name="Destino" required type="text" id="Destino" placeholder="Destino">
			<br>
			<label for="IdUnidad">Id de la unidad:</label>
			<input value="<?php echo $datos1->IdUnidad ?>" class="form-control" name="IdUnidad" required type="number" id="IdUnidad" placeholder="Id de la Unidad">
			
			<label for="FechaHora_Salida">Fecha y Hora de Salida:</label>
			<input value="<?php echo $datos1->FechaHora_Salida ?>" class="form-control" name="FechaHora_Salida" required type="datetime" id="FechaHora_Salida" placeholder="Fecha y Hora de Salida" min="<?php echo  date('Y-m-d\TH:i'); ?>">

			<label for="FechaHora_Llegada">Fecha y Hora de Llegada:</label>
			<input value="<?php echo $datos1->FechaHora_Llegada ?>" class="form-control" name="FechaHora_Llegada" required type="datetime" id="FechaHora_Llegada" placeholder="Fecha y Hora de Llegada" min="<?php echo  date('Y-m-d\TH:i'); ?>">
			
			<br><br><input class="btn btn-dark" type="submit" value="Guardar">
			<a class="btn btn-danger" href="./infoPaquetes.php">Cancelar</a>
		</form>
	</div>

